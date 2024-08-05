<?php

namespace App\Livewire\AgentsDashboardItems;

use App\Models\ac_company;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectCampaign extends Component
{
    public $campaigns;
    public $selectedBound;
    public $selectedCampaign;

    public function mount()
    {
        $this->campaigns=ac_company::where('del_status', 0)->get(); 

        $this->selectedCampaign =  Cache::remember('selected-campaign', 60, function () {
            return [];
        });;
 
    }

    public function render()
    {
        return view('livewire.agents-dashboard-items.select-campaign'); 
    }


    public function updatedSelectedCampaign($value)
    {
        $this->dispatch('update-campaign',$this->selectedCampaign);
        // $this->dispatch('update-campaignId',$this->selectedCampaign);

        Cache::put('selected-campaign', $this->selectedCampaign, 60);
    }
 

}
 