<?php

namespace App\Livewire\DashboardItems;

use App\Models\CallData;
use Livewire\Component;

class Completed extends Component
{
    public function render()
    {
        
        $tot = CallData::where('call_status', 'answered')->count();


        return view('livewire.dashboard-items.completed',['tot'=>$tot]);
    }
}
