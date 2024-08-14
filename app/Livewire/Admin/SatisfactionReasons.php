<?php

namespace App\Livewire\Admin;

use App\Models\ac_company;
use App\Models\call_dissatisfaction_reason;
use App\Models\call_satisfaction_reason;
use Database\Seeders\satisfaction_reasons;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SatisfactionReasons extends Component
{
    public $isOpen = false;
    public $isNew = false;
    public $noReasonscampaigns;
    public $newSatisfactionReason;
    public $newSatisReasons = [];
    public $newDissatisfactionReason;
    public $newDissatisReasons = [];
    public $selectedCampaign;
    public $campaigns;

    public $isEdit = false;
    public $editCampaign;


    protected $listeners = ['buttonClicked'];

    public function buttonClicked()
    {
        $this->isOpen = true;
        $this->noReasonscampaigns = ac_company::where('del_status', '!=', 1)
            ->where('set_reasons', Null)
            ->get();
    }

    public function close()
    {
        $this->isOpen = false;
        $this->newDissatisReasons=[];
        $this->newSatisReasons=[];
    }

    public function closedNew()
    {
        $this->isNew = false;
        $this->isEdit = false;
        $this->isOpen = true;
        $this->newDissatisReasons=[];
        $this->newSatisReasons=[];

    }

    public function openedNew()
    {

        $this->isNew = true;
        // $this->isOpen=false;
    }

    public function addSatisReason()
    {
        $this->validate([
            'newSatisfactionReason' => 'required'
        ]);
        $this->newSatisReasons[] = $this->newSatisfactionReason;
        $this->newSatisfactionReason = " ";

        // dd($this->newSatisfactionReason);

    }

    public function addDissatisReason()
    {
        $this->validate([
            'newDissatisfactionReason' => 'required'
        ]);
        $this->newDissatisReasons[] = $this->newDissatisfactionReason;
        $this->reset('newDissatisfactionReason');

        // dd($this->newSatisfactionReason);

    }

    public function removeSatisReason($key)
    {
        // dd($id);
        // Remove the item from the array using the key
        unset($this->newSatisReasons[$key]);

        // Re-index the array to ensure there are no gaps
        $this->newSatisReasons = array_values($this->newSatisReasons);
    }

    public function removeDissatisReason($key)
    {
        // dd($id);
        // Remove the item from the array using the key
        unset($this->newDissatisReasons[$key]);

        // Re-index the array to ensure there are no gaps
        $this->newDissatisReasons = array_values($this->newDissatisReasons);
    }

    public function assignReasons()
    {
        $this->validate([
            'newSatisReasons' => 'required',
            'newDissatisReasons' => 'required',
            'selectedCampaign' => 'required',
        ]);

        // dd($this->selectedCampaign,$this->newSatisReasons,$this->newDissatisReasons);
        call_satisfaction_reason::create([
            'campaign_id' => $this->selectedCampaign,
            'reasons' => $this->newSatisReasons
        ]);
        call_dissatisfaction_reason::create([
            'campaign_id' => $this->selectedCampaign,
            'reasons' => $this->newDissatisReasons
        ]);
        ac_company::where('id', $this->selectedCampaign)
            ->update([
                'set_reasons' => '1'
            ]);

        $this->isNew = false;
        $this->newDissatisReasons=[];
        $this->newSatisReasons=[];
    }

    public function editReasons($cmpId)
    {
        $this->isEdit = true;
        $this->editCampaign = ac_company::where('id', $cmpId)
            ->with(['satisfactionReasons', 'dissatisfactionReasons'])
            ->first();

        // dd($this->editCampaign->satisfactionReasons);
        // Check if satisfactionReasons relation exists
        if ($this->editCampaign->satisfactionReasons->isNotEmpty()) {
            foreach ($this->editCampaign->satisfactionReasons as $satisfactionReason) {
                if (is_array($satisfactionReason->reasons)) {
                    $this->newSatisReasons = array_merge($this->newSatisReasons, $satisfactionReason->reasons);
                } elseif (is_string($satisfactionReason->reasons)) {
                    $reasonsArray = json_decode($satisfactionReason->reasons, true);
                    if (is_array($reasonsArray)) {
                        $this->newSatisReasons = array_merge($this->newSatisReasons, $reasonsArray);
                    }
                }
            }
        }

        // Process dissatisfaction reasons
        if ($this->editCampaign->dissatisfactionReasons->isNotEmpty()) {
            foreach ($this->editCampaign->dissatisfactionReasons as $dissatisfactionReason) {
                if (is_array($dissatisfactionReason->reasons)) {
                    $this->newDissatisReasons = array_merge($this->newDissatisReasons, $dissatisfactionReason->reasons);
                } elseif (is_string($dissatisfactionReason->reasons)) {
                    $reasonsArray = json_decode($dissatisfactionReason->reasons, true);
                    if (is_array($reasonsArray)) {
                        $this->newDissatisReasons = array_merge($this->newDissatisReasons, $reasonsArray);
                    }
                }
            }
        }
    }

    public function updateReasons($cmpId)
    {


        $this->validate([
            'newSatisReasons' => 'required',
            'newDissatisReasons' => 'required',
        ]);

        // dd($this->selectedCampaign,$this->newSatisReasons,$this->newDissatisReasons);
        call_satisfaction_reason::where(
            'campaign_id',$cmpId)
            ->update([
            'reasons' => $this->newSatisReasons
        ]);
        call_dissatisfaction_reason::where(
            'campaign_id' ,$cmpId)
            ->update([ 
            'reasons' => $this->newDissatisReasons
        ]);

        $this->isEdit = false;
        $this->newDissatisReasons=[];
        $this->newSatisReasons=[];
    }



    public function mount()
    {

        // Retrieve all active campaigns
        $this->campaigns = ac_company::where('del_status', '!=', 1)
            ->where('set_reasons', '1')
            ->with(['satisfactionReasons', 'dissatisfactionReasons'])
            ->get();

        // dd($this->campaigns);
    }




    public function render()
    {
        return view('livewire.admin.satisfaction-reasons');
    }
}
