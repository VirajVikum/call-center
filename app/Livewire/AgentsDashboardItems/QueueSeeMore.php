<?php

namespace App\Livewire\AgentsDashboardItems;

use App\Models\ad_campaign;
use Illuminate\Support\Facades\Log;
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
    public $isCallAnswered =false;
    public $completedRows=[];


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

    public function callAnswered()
    {
        $this->isCallAnswered =true;
        Log::info('Answered button clicked', ['time' => now()]);
    }


    // submit button of answered form
    public function answered($rowId)
    {
        
        $this->dispatch('open-answered',$this->phone,$this->campaignId,$rowId);
        Log::info('Clicked submit button of answered blade', ['time' => now()]);
    }

    #[On('completed-job')]
    public function completedRow($rowId)
    {
        $this->completedRows;
        $this->completedRows[] = $rowId;
    }


    public function callBack()
    {
        
        $this->dispatch('open-callback',$this->phone,$this->campaignId);
    }


    public function noAnswered()
    {
        
        $this->dispatch('open-noAnswer',$this->phone,$this->campaignId);
    }

    public function unReachable()
    {
        
        $this->dispatch('open-noAnswer',$this->phone,$this->campaignId);
    }

    public function notInUse()
    {
        ad_campaign::where('contact_1', $this->phone)
        ->update([
            'last_call_status' => '5',
            'status'=> -1 ,
            'agent_id' => auth()->id()
        ]);
        
    }


    public function render()
    {
        return view('livewire.agents-dashboard-items.queue-see-more');
    }
}


// last call status------>
                // 1- answered
                // 2-call back
                // 3- noAnswer
                // 4- exeed 3 call times
                // 5- not in use  (status=>-1)