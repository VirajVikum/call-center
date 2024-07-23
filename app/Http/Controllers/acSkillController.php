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

    // Convert the JSON strings back to arrays
    $decodedSkills = array_map('json_decode', $skillObjects);

    // Modify the skill objects to remove unwanted fields
    $modifiedSkills = array_map(function($skill) {
        unset($skill->updated_at, $skill->moh, $skill->created_at);
        return $skill;
    }, $decodedSkills);

    // Extract only skills
    $onlySkills = array_map(function($skill) {
        return $skill->skill;
    }, $decodedSkills);

    // Convert the skills to a string
    $serializedSkills = implode(', ', $onlySkills);

    // Prepare skill IDs and skills mapping
    $result = [];
    foreach ($modifiedSkills as $item) {
        $result[$item->id] = $item->skill; // Access properties of object
    }

    // Convert the array to JSON
    $jsonResult = json_encode($result);

    // Retrieve the agent ID
    $agentId = $request->input('user_id');

    // Create or update the record in the database
    ad_agentSkill::updateOrCreate(
        ['agent_id' => $agentId], // Condition to find the record
        [
            'skills' => $serializedSkills,
            'skill_ids' => $jsonResult
        ]
    );

    // Redirect to the skills route
    return redirect(route('skills'));
}


}
