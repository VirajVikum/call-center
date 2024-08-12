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
    public $isAnswered = false;
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

    public $iscallback =false;
    public $date ;
    public $CallBackTime ;
    public $hours  ;
    public $minutes  ;
    public $ampm = 'AM' ;

    public $isNoAnswer =false;
    public $callCount;


    #[On('open-answered')]
    public function answered($phone, $campaignId,$rowId)
    {
        $this->isOpen = true;
        $this->isAnswered = true;
        $this->rowId=$rowId;
        $this->phone = $phone;
        $this->campaignId = $campaignId;
        // Log::info('Received campaignId: ' . $campaignId);
        $this->updateReasons();
        // dd($rowId);
        Log::info('Sent data to component', ['time' => now()]);
    }


    #[On('update-campaignId')]
    public function setReasons($campaignId)
    {
        $this->campaignId = $campaignId;
        // Log::info('Received campaignId: ' . $campaignId);
        Cache::put('selected-campaignid', $this->campaignId, 60);
        $this->updateReasons();
        Log::info('Called upadate reasons function', ['time' => now()]);
    }

    #[On('set-rating')]
    public function setRating($value)
    {
        $this->rating=$value;
        // if($this->rating==1)
        // {
        //     $this->satisfactStatus="Poor";
        // }
        // elseif($this->rating==2)
        // {
        //     $this->satisfactStatus="Fair";
        // }
        // elseif($this->rating==3)
        // {
        //     $this->satisfactStatus="Average";
        // }
        // elseif($this->rating==4)
        // {
        //     $this->satisfactStatus="Good";
        // }
        // elseif($this->rating==5)
        // {
        //     $this->satisfactStatus="Excellent";
        // }

        switch ($this->rating) {
            case 1:
                $this->satisfactStatus = "Poor";
                break;
            case 2:
                $this->satisfactStatus = "Fair";
                break;
            case 3:
                $this->satisfactStatus = "Average";
                break;
            case 4:
                $this->satisfactStatus = "Good";
                break;
            case 5:
                $this->satisfactStatus = "Excellent";
                break;
            default:
                $this->satisfactStatus = "Unknown";
                break;
        }
        Log::info('Set rating description according to the rate', ['time' => now()]);
        
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
        Log::info('Started reasons fetching', ['time' => now()]);

        if ($this->campaignId) {
            $this->satisfactReasons = call_satisfaction_reason::where('campaign_id', $this->campaignId)
                ->pluck('reasons') // column name
                ->toArray();
            // Log::info('Satisfaction Reasons: ' . json_encode($this->satisfactReasons));
        } else {
            $this->satisfactReasons = [];
        }

        if ($this->campaignId) {
            $this->disSatisfactReasons = call_dissatisfaction_reason::where('campaign_id', $this->campaignId)
                ->pluck('reasons') // column name
                ->toArray();
            // Log::info('DisSatisfaction Reasons: ' . json_encode($this->disSatisfactReasons));
        } else {
            $this->disSatisfactReasons = [];
        }

        Log::info('End reasons fetching', ['time' => now()]);

    }

    public function close()
    {
        $this->isOpen = false;
        $this->isAnswered = false;
        $this->iscallback = false;
    }

    // Answered - 1
    // No answered - 2
    // Unreachable - 3
    // Call back - 4
    // Not in use - 0 

    public function updateCampaign()
    {
        Log::info('Started to updated DB', ['time' => now()]);

        $time = new DateTime();
        // $formattedTime = $time->format('Y-m-d H:i:s');
        $updateRow = ad_campaign::find($this->rowId);
        $updateRow->update(['last_call_status'=>'1','status'=>'1','agent_id'=>auth()->id(),'call_attempt'=>$this->callAttempt,'satisfaction_level'=>$this->rating,'satisfaction_status'=>$this->satisfactStatus,'satisfaction_reasons'=>$this->selectedSatisfactReasons,'dissatisfaction_reasons'=>$this->selectedDisSatisfactReasons,'completed_date'=>$time,'remarks'=>$this->remarks]);

        // dd($updateRow);
        $this->dispatch('completed-job',$this->rowId);

        // $this->rowId = null;
    // $this->callAttempt = null;
    $this->rating = null;
    $this->satisfactStatus = null;
    $this->selectedSatisfactReasons = [];
    $this->selectedDisSatisfactReasons = [];
    $this->remarks = null;

        $this->isOpen=false;

        Log::info('Updated DB', ['time' => now()]);
    }



    #[On('open-callback')]
    public function callback($phone, $campaignId)
    {
        // dd($rowId);
        // $this->rowId=$rowId;
        $this->phone=$phone;
        $this->campaignId=$campaignId;
        $this->isOpen=true;
        $this->iscallback =true;
        $this->date = (new \DateTime())->format('Y-m-d');
        


    }

    public function setCallbackTime()
    {
        $this->CallBackTime = sprintf('%02d:%02d %s', $this->hours, $this->minutes, $this->ampm);
        
        // dd($this->CallBackTime,$this->date);
        // dd($this->ampm);
        $dateTimeString = $this->date . ' ' . $this->CallBackTime;
        $formattedDateTime = date('Y-m-d H:i', strtotime($dateTimeString));

        // $updateRow = ad_campaign::find($this->rowId);
        // $updateRow->update(['last_call_status'=>'2','next_available_at'=>$formattedDateTime,'agent_id'=>auth()->id()]);

        // dd($this->phone);
        ad_campaign::where('contact_1', $this->phone)
        ->update([
            'last_call_status' => '2',
            'next_available_at' => $formattedDateTime,
            'agent_id' => auth()->id()
        ]);
        $this->iscallback =false;
        $this->isOpen=false;

    
    }

    #[On('open-noAnswer')]
    public function noAnswer($phone, $campaignId)
    {
        $this->phone=$phone;
        $this->campaignId=$campaignId;
        $this->isOpen=true;
        $row =ad_campaign::where('contact_1', $this->phone)->first();
        $this->callCount = $row['call_attempt']!=Null?$row['call_attempt']:0;
        $this->isNoAnswer =true;

        $this->setCallcount();

    }

    public function setCallcount()
    {
        $today = new DateTime();
        if($this->callCount=0)
        {
            $nextCall = $today->modify('+3 hours')->format('Y-m-d H:i:s');
        }
        elseif($this->callCount=1)
        {
            $nextCall = $today->modify('+3 day')->format('Y-m-d');
        }
        else
        {
            $nextCall = Null;
        }

        if($this->callCount <3)
        {
            ad_campaign::where('contact_1', $this->phone)
            ->update([
                'last_call_status' => '2', // should call again
                'call_attempt' => $this->callCount+1,
                'next_available_at' => $nextCall,
                'agent_id' => auth()->id()
            ]);
        }
        else{
            ad_campaign::where('contact_1', $this->phone)
            ->update([
                'last_call_status' => '4',  // won't call again
                'call_attempt' => $this->callCount+1,
                'agent_id' => auth()->id()
            ]);
        }
        $this->isNoAnswer =false;
        $this->isOpen=false;
        
    }


    public function render()
    {
        // Log::info('Rendering CallAnswered with campaignId: ' . json_encode($this->campaignId));
        Log::info('Show answered blade', ['time' => now()]);
        return view('livewire.agents-call-queue-items.call-answered');
    }
}


// last call status------>
                // 1- answered
                // 2-call back
                // 3- noAnswer (set as 2 to use same function of callback)
                // 4- exeed 3 call times
                // 5- not in use  (status=>-1)