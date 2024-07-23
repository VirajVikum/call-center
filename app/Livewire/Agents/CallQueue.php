<?php

namespace App\Livewire\Agents;

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class CallQueue extends Component
{
    public $selectedCampaignId = null;
    public $selectedSkills = [];

    protected $listeners = ['campaignSelected'];

    #[On('campaign-selected')]
    public function campaignSelected($campaignId)
    {
        $this->selectedCampaignId = $campaignId;
    }


    public function render()
    {
        return view('livewire.agents.call-queue');
    }

    #[On('update-selected-skills')]
    public function updateselectedSkills($updatedSkills)
    {
        $this->selectedSkills =$updatedSkills; 
        
    }

    #[On('update-campaign')]
    public function updateSelectedCampaignId($updatedCampaign)
    {
        $this->selectedCampaignId =$updatedCampaign; 
        
    }

    

    public function mount()
    {
        $this->selectedSkills =  Cache::remember('selected-skills', 60, function () {
            return [];
        });;

        $this->selectedCampaignId =  Cache::remember('selected-campaign', 60, function () {
            return [];
        });;
    }
}
