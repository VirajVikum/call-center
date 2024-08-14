<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_company extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'type',
        'del_status'
        ];

         // Define relationship with call_satisfaction_reason
    public function satisfactionReasons()
    {
        return $this->hasMany(call_satisfaction_reason::class, 'campaign_id');
    }

    // Define relationship with call_dissatisfaction_reason
    public function dissatisfactionReasons()
    {
        return $this->hasMany(call_dissatisfaction_reason::class, 'campaign_id');
    }
}
