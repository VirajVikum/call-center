<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCount extends Model
{
    public $timestamps = false;


    use HasFactory;
    protected $fillable = [
            'id',
            'uniqueid',
            'callcount',
            'direction',
            'status',
            'ani',
            'dnis',
            'date'
    ];
}

            // "id":1,
            // "uniqueid":115565,
            // "callcount":1,
            // "direction":"in",
            // "status":1,
            // "ani":521,
            // "dnis":"0716857582",
            
