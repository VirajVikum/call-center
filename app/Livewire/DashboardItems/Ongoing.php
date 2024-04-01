<?php

namespace App\Livewire\DashboardItems;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ongoing extends Component
{
    public function render()
    {
        $count = DB::table('callcount')->where('status', 1)->count();

        return view('livewire.dashboard-items.ongoing',['count'=>$count]);
    }
}
