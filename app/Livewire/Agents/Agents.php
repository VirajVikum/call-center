<?php

namespace App\Livewire\Agents;

use App\Models\CallData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;



class Agents extends Component
{
    public $selectedSkills = [];
    public $userId ;

    #[On('update-selected-skills')]
    public function updateSelectedSkills($updatedSkills,$userId)
    {
        $this->selectedSkills=$updatedSkills;
        $this->userId=$userId;
    }

    public function render()
    {
        $agents =User::where('del_status',0)->where('user_type_id','!=',1)->get();
        $selectedSkills = DB::table('au_agentqueuestatus')->get(); 
        $callCounts = CallData::select('agent_id', 
                                   DB::raw('count(*) as total_calls'),
                                   DB::raw('sum(case when call_status = "answered" then 1 else 0 end) as answered_calls'))
                         ->groupBy('agent_id')
                         ->get();

        $agentsWithCallCounts = $agents->map(function($agent) use ($callCounts) {
        $agentCallCount = $callCounts->firstWhere('agent_id', $agent->id);
        $agent->total_calls = $agentCallCount ? $agentCallCount->total_calls : '00';
        $agent->answered_calls = $agentCallCount ? $agentCallCount->answered_calls : '00';
        return $agent;
        
        
    });
        
        return view('livewire.agents.agents',['agnt'=>$agentsWithCallCounts , 'skills'=>$selectedSkills,]);
    }
}
