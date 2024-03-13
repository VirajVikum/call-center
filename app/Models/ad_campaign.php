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
    ];
}
