<?php

namespace App\Livewire\AgentsCallQueueItems;

use App\Models\call_dissatisfaction_reason;
use App\Models\call_satisfaction_reason;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class CallAnswered extends Component
{
    public $isOpen = false;
    public $phone;
    public $campaignId;
    public $satisfactReasons = [];
    public $disSatisfactReasons = [];

    #[On('open-answered')]
    public function answered($phone, $campaignId)
    {
        $this->isOpen = true;
        $this->phone = $phone;
        $this->campaignId = $campaignId;
        Log::info('Received campaignId: ' . $campaignId);
        $this->updateReasons();
    }

    #[On('update-campaignId')]
    public function setReasons($campaignId)
    {
        $this->campaignId = $campaignId;
        Log::info('Received campaignId: ' . $campaignId);
        Cache::put('selected-campaignid', $this->campaignId, 60);
        $this->updateReasons();
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
            Log::info('Satisfaction Reasons: ' . json_encode($this->satisfactReasons));
        } else {
            $this->satisfactReasons = [];
        }

        if ($this->campaignId) {
            $this->disSatisfactReasons = call_dissatisfaction_reason::where('campaign_id', $this->campaignId)
                ->pluck('reasons') // Ensure the correct column name
                ->toArray();
            Log::info('DisSatisfaction Reasons: ' . json_encode($this->disSatisfactReasons));
        } else {
            $this->disSatisfactReasons = [];
        }

    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        Log::info('Rendering CallAnswered with campaignId: ' . json_encode($this->campaignId));
        return view('livewire.agents-call-queue-items.call-answered');
    }
}
