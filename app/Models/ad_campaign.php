<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ad_campaign extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'campaign_id',
        'contact_1',
        'contact_2',
        'status',
        'language',
        'data',
        'outlet',
        'last_call_status',
        'agent_id',
        'call_attempt',
        'next_available_at',
        'satisfaction_level',
        'satisfaction_status',
        'satisfaction_reasons',
        'dissatisfaction_reasons',
        'completed_date',
        'remarks',
    ];
}
