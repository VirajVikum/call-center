<?php

namespace App\Livewire\DashboardItems;

use App\Models\ac_user;
use Livewire\Component;

class Agents extends Component
{
    public function render()
    {
        $agents =ac_user::all();

        return view('livewire.dashboard-items.agents',['agnt'=>$agents]);
    }
}
