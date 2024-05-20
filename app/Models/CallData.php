<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallData extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'agent_id',
            'phone',
            'language',
            'center',
            'call_status',
            'job_status',
            'customer_status',
            'comment',
            'score'         
    ];

    public function userType()
    {
        return $this->belongsTo(ac_user_types::class, 'user_type_id');
    }
}
