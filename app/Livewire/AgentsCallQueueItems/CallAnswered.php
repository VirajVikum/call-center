<?php

namespace App\Livewire\AgentsCallQueueItems;

use App\Models\ad_campaign;
use App\Models\call_dissatisfaction_reason;
use App\Models\call_satisfaction_reason;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
// use Carbon\Carbon;

class CallAnswered extends Component
{
    public $isOpen = false;
    public $phone;
    public $campaignId;
    public $satisfactReasons = [];
    public $selectedSatisfactReasons = [];
    public $disSatisfactReasons = [];
    public $selectedDisSatisfactReasons = [];
    public $rating;
    public $remarks;
    public $rowId;
    public $callAttempt =1;
    public $satisfactStatus;

    #[On('open-answered')]
    public function answered($phone, $campaignId,$rowId)
    {
        $this->isOpen = true;
        $this->rowId=$rowId;
        $this->phone = $phone;
        $this->campaignId = $campaignId;
        // Log::info('Received campaignId: ' . $campaignId);
        $this->updateReasons();
    }

    #[On('update-campaignId')]
    public function setReasons($campaignId)
    {
        $this->campaignId = $campaignId;
        // Log::info('Received campaignId: ' . $campaignId);
        Cache::put('selected-campaignid', $this->campaignId, 60);
        $this->updateReasons();
    }

    #[On('set-rating')]
    public function setRating($value)
    {
        $this->rating=$value;
        if($this->rating==1)
        {
            $this->satisfactStatus="Poor";
        }
        elseif($this->rating==2)
        {
            $this->satisfactStatus="Fair";
        }
        elseif($this->rating==3)
        {
            $this->satisfactStatus="Average";
        }
        elseif($this->rating==4)
        {
            $this->satisfactStatus="Good";
        }
        elseif($this->rating==5)
        {
            $this->satisfactStatus="Excellent";
        }
        
    }

    public function mount()
    {
        $this->campaignId = Cache::remember('selected-campaignid', 60, function () {
            return null;
        });

        if ($this->campaignId) {
            $this->updateReasons();
        }
    }

    public function updateReasons()
    {
        if ($this->campaignId) {
            $this->satisfactReasons = call_satisfaction_reason::where('campaign_id', $this->campaignId)
                ->pluck('reasons') // Ensure the correct column name
                ->toArray();
            // Log::info('Satisfaction Reasons: ' . json_encode($this->satisfactReasons));
        } else {
            $this->satisfactReasons = [];
        }

        if ($this->campaignId) {
            $this->disSatisfactReasons = call_dissatisfaction_reason::where('campaign_id', $this->campaignId)
                ->pluck('reasons') // Ensure the correct column name
                ->toArray();
            // Log::info('DisSatisfaction Reasons: ' . json_encode($this->disSatisfactReasons));
        } else {
            $this->disSatisfactReasons = [];
        }

    }

    public function close()
    {
        $this->isOpen = false;
    }

    // Answered - 1
    // No answered - 2
    // Unreachable - 3
    // Call back - 4
    // Not in use - 0 

    public function updateCampaign()
    {
        $time = new DateTime();
        // $formattedTime = $time->format('Y-m-d H:i:s');
        $updateRow = ad_campaign::find($this->rowId);
        $updateRow->update(['last_call_status'=>'1','agent_id'=>auth()->id(),'call_attempt'=>$this->callAttempt,'satisfaction_level'=>$this->rating,'satisfaction_status'=>$this->satisfactStatus,'satisfaction_reasons'=>$this->selectedSatisfactReasons,'dissatisfaction_reasons'=>$this->selectedDisSatisfactReasons,'completed_date'=>$time,'remarks'=>$this->remarks]);

        $this->isOpen=false;
    }

    public function render()
    {
        // Log::info('Rendering CallAnswered with campaignId: ' . json_encode($this->campaignId));
        return view('livewire.agents-call-queue-items.call-answered');
    }
}
