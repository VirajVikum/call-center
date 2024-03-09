<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_extension extends Model
{
    use HasFactory;
    protected $fillable = [
        'extension',
        'extension_type',
        'context',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Define a creating event listener
        static::creating(function ($extension) {
            // Set the default value for status if it's not provided
            if (!isset($extension->status)) {
                $extension->status = 0; // Set default value here
            }
        });
    }

}
