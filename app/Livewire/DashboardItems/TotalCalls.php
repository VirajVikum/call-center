<?php

namespace App\Livewire\DashboardItems;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalCalls extends Component
{
    public function render()
    {
        $tot = count(DB::table('callcount')->get());

        return view('livewire.dashboard-items.total-calls',['tot'=>$tot]);
    }
}
