<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class call_satisfaction_reason extends Model
{
    use HasFactory;

    protected $fillable =[
        'campaign_id',
        'reasons'
    ];

    protected $casts = [
        'reasons' => 'array',
    ];

}
