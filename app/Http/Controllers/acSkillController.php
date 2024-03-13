<?php

namespace App\Http\Controllers;

use App\Models\ac_skill;
use App\Models\ad_agentSkill;
use Illuminate\Http\Request;

class acSkillController extends Controller
{
    public function acSkil_store(Request $request)
    {
        $data = $request->validate([
            'skill'=>'required',
        ]);
        $newSkill = ac_skill::create($data);
        return redirect(route('skills'));
    }

    public function acSkil_delete(ac_skill $skill)
    {
        $skill->delete();
        return redirect(route('skills'));
    }

    

public function assign_skill(Request $request)
{
    // Retrieve the skill objects array
    $skillObjects = $request->input('skill');
    // dd($skillObjects);
    // Convert the JSON strings back to arrays
    $decodedSkills = array_map('json_decode', $skillObjects);
    // dd($decodedSkills);
    // Modify the skill objects to remove unwanted fields
    $modifiedSkills = array_map(function($skill) {
        unset($skill->updated_at, $skill->moh, $skill->created_at);
        return $skill;

    }, $decodedSkills);

    //return only skills
    $onlySkills = array_map(function($skill) {
        
        return $skill->skill;
        
    }, $decodedSkills);

    // Convert the modified array to a JSON string
    //$serializedSkillIds = json_encode($modifiedSkills);
    // $serializedSkills = json_encode($onlySkills);
    $serializedSkills = implode(', ', $onlySkills);
    
//$dataAry = json_decode($serializedSkillIds, true);

$result = [];
foreach ($modifiedSkills as $item) {
    //$result[$item['id']] = $item['skill']; // access properties of array
    $result[$item->id] = $item->skill;     // access properties of object
}

// Convert the array to JSON
$jsonResult = json_encode($result);

    // Retrieve the agent ID
    $agentId = $request->input('user_id');

    // Create the data array for insertion
    $data = [
        'agent_id' => $agentId,
        'skills' => $serializedSkills,
        'skill_ids' => $jsonResult
    ];

    // Create a new record in the database
    $newRecord = ad_agentSkill::create($data);

    // Redirect to the skills route
    return redirect(route('skills'));
}


}
