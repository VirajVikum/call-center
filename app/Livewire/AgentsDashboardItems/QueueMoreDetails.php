<?php

namespace App\Livewire\AgentsDashboardItems;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class QueueMoreDetails extends ModalComponent
{
    public $phone;

    public function mount($phone)
    {
        $this->phone = $phone;
        // $this->customerLan = $customerLan;
    }
 

    public function close()
    {
        $this->emit('closeModal'); 
    }


    public function render()
    {
        return view('livewire.agents-dashboard-items.queue-more-details');
    }
}
