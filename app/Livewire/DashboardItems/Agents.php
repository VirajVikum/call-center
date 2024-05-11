<?php

namespace App\Livewire\DashboardItems;

use App\Models\ac_user;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Agents extends Component
{
    public function render()
    {
        $agents =ac_user::where('del_status',0)->get();
        $selectedSkills = DB::table('au_agentqueuestatus')->get();
        

        return view('livewire.dashboard-items.agents',['agnt'=>$agents , 'skills'=>$selectedSkills]);
    }
}
