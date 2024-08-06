<?php

namespace App\Livewire\Agents;

use App\Models\ad_campaign;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class CallQueue extends Component
{
    public $selectedCampaignId = null;
    public $selectedSkills = [];
    public $userId;
    public $phone1;
    public $customerLan;
    public $showStart = false;
    public $started = false;
    public $campaignData;



    // protected $listeners = ['campaignSelected'];

    #[On('campaign-selected')]
    public function campaignSelected($campaignId)
    {
        $this->selectedCampaignId = $campaignId;
         
       
    }

    #[On('update-selected-skills')]
    public function updateselectedSkills($updatedSkills,$id)
    {
        $this->selectedSkills =$updatedSkills; 
        $this->userId =$id; 
        
        
        
    }
    
    

    #[On('update-campaign')]
    public function updateSelectedCampaignId($updatedCampaign)
    {
        $this->selectedCampaignId =$updatedCampaign; 
        
        
    }

    // public function boot()
    // {
    //     if($this->selectedCampaignId && $this->selectedSkills)
    //     {
    //         $this->showStart=true;
    //     }
    // }

    public function openModal()
    {
        $this->dispatch('open-modal',$this->phone1,$this->customerLan,$this->campaignData,$this->selectedCampaignId);
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

    public function render()
    {
        // if($this->selectedCampaignId && $this->selectedSkills)
        // {
        //     $this->showStart=true;
        // }

        return view('livewire.agents.call-queue');
    } 
    

    public function findNumber()
    {
        if (!empty($this->selectedSkills) && $this->selectedCampaignId != null)
        {
        $campaign = ad_campaign::where('campaign_id', $this->selectedCampaignId)
        ->where(function($query) {
            $query->where('status', '0')
                  ->orWhere('status', '2');
        })
        ->whereIn('language', $this->selectedSkills)
        ->first();
        

            if ($campaign) {
                $this->phone1 = $campaign->contact_1;
                
                $this->customerLan=$campaign->language;

                // $subCampaigns = ad_campaign::where('contact_1',$this->phone1)->get();
                $this->campaignData= ad_campaign::where('contact_1',$this->phone1)->get();
                ad_campaign::where('contact_1', $this->phone1)->update(['status' => '1']);
                
            }
            else{
                $this->phone1="";
                $this->customerLan="";
            }
        
        
        }
        // else
        // {
        //     $this->phone1="2";
        // }
        // dd("phone1");
        $this->started=true;
        

    }

   
    
   
    

}
