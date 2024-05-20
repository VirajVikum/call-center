<?php

namespace App\Livewire\DashboardItems;

use App\Models\ac_user;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Agents extends Component
{
    public function render()
    {
        $agents =User::where('del_status',0)->where('user_type_id','!=',1)->get();
        $selectedSkills = DB::table('au_agentqueuestatus')->get();
        

        return view('livewire.dashboard-items.agents',['agnt'=>$agents , 'skills'=>$selectedSkills]);
    }
}
