<?php

namespace App\Livewire\DashboardItems;

use App\Models\CallData;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalCalls extends Component
{
    public function render()
    {
        // $tot = count(DB::table('call_counts')->get());
        $tot = CallData::count();

        return view('livewire.dashboard-items.total-calls',['tot'=>$tot]);
    }
}
