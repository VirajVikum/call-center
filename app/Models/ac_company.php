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
}
