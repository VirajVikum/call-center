<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_user_types extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'id',
        'title'
        ];
}
