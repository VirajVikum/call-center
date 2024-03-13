<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ad_agentSkill extends Model
{
    use HasFactory;
    protected $fillable=[
        'agent_id',
        'skills',
        'skill_ids'
    ];
}
