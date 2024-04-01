<?php

namespace App\Livewire\DashboardItems;

use Livewire\Component;

class NoAnswer extends Component
{
    public $statu = 1;





    public function render()
    {
        //for ($i = 0; $i < 1; $i++) {
            if ($this->statu == 1) {
                $this->statu = 0;
                return view('livewire.dashboard-items.no-answer',['statu'=>$this->statu]);
            } else {
                $this->statu = 1;
                return view('livewire.dashboard-items.no-answer',['statu'=>$this->statu]);
            }
            // Flush the output buffer to ensure immediate printing
            flush();
            // Sleep for 1 second before printing the next "Hello, world!"
            //sleep(1);
       // }

       

        
    }
}
