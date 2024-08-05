<?php

namespace App\Livewire\AgentsDashboardItems;

use Livewire\Attributes\On;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class QueueSeeMore extends Component
{
    public $isOpen = false;
    public $phone;
    public $skill;
    public $campaignId;
    public $campaignData;
    public $campaignMoreData;


    #[On('open-modal')]
    public function openModal($phone,$lan,$data,$campaignId)
    {
        $this->phone=$phone;
        $this->skill=$lan;
        $this->isOpen = true;
        // $this->campaignData=$data;

        // Ensure that we only decode JSON strings and handle already decoded arrays.
        $this->campaignData = collect($data)->map(function ($item) {
            // Check if 'data' property exists and is a string
            if (isset($item['data']) && is_string($item['data'])) {
                $item['data'] = json_decode($item['data'], true); // Decode JSON string to an associative array
            }
            return $item;
        })->all(); // Convert the collection back to an array if needed

        // dd($this->campaignData); // Uncomment for debugging
        $this->campaignId=$campaignId;
            
    }

    

    public function close()
    {
        $this->isOpen = false;
    }


    public function answered()
    {
        
        $this->dispatch('open-answered',$this->phone,$this->campaignId);
    }


    public function render()
    {
        return view('livewire.agents-dashboard-items.queue-see-more');
    }
}
