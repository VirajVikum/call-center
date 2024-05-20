<?php

namespace App\Livewire\DashboardItems;

use App\Models\CallData;
use Livewire\Component;

class NoAnswer extends Component
{
    public $statu = 1;





    public function render()
    {
        //for ($i = 0; $i < 1; $i++) {
            // if ($this->statu == 1) {
            //     $this->statu = 0;
            //     return view('livewire.dashboard-items.no-answer',['statu'=>$this->statu]);
            // } else {
            //     $this->statu = 1;
            //     return view('livewire.dashboard-items.no-answer',['statu'=>$this->statu]);
            // }
            // // Flush the output buffer to ensure immediate printing
            // flush();
            
       // }

       $tot = CallData::where('call_status', 'not answered')->count();


        return view('livewire.dashboard-items.no-answer',['tot'=>$tot]);

       

        
    }
}
