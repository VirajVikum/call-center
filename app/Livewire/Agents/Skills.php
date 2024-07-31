<?php

namespace App\Livewire\Agents;

use App\Models\ad_agentSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Psy\Readline\Hoa\Console;

class Skills extends Component
{
    public $assignedSkills = [];
    public $selectedSkills = []; //binded to component view wiremodel

    public function mount()
    {
        $userId = Auth::id();
        $userSkillsRecord = ad_agentSkill::where('agent_id', $userId)->first();
        if ($userSkillsRecord) {
            // Assuming the skills are stored as a comma-separated string
            $this->assignedSkills = explode(', ', $userSkillsRecord->skills);
                    
        } else {
            $this->assignedSkills = [];
        }
        $this->selectedSkills =  Cache::remember('selected-skills', 60, function () {
            return [];
        });;
    }

    

    public function render()
    {

        return view('livewire.agents.skills');
    }

    public function updatedSelectedSkills($value)
    {
        $this->dispatch('update-selected-skills',$this->selectedSkills,Auth::id());
        Cache::put('selected-skills', $this->selectedSkills, 60);
    }

    
}
