<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ac_user extends Model
{
    use HasFactory, HasRoles;
    protected $guard_name = 'web';
    protected $fillable = [
        
        'id',	
        'name',	
        'email',
        'user_name',
        'phone',
        'nic',
        'gender',	
        'address',		
        'password',			 
        'extension', 
        'user_type_id',
        'status',
        'del_status',
        ];
    public function userType()
    {
        return $this->belongsTo(ac_user_types::class, 'user_type_id');
    }

    public function extension()
    {
        return $this->belongsTo(ac_extension::class, 'extension');
    }

    protected static function boot()
    {
        parent::boot();

        // Define a creating event listener
        static::creating(function ($user) {
            // Set the default value for status if it's not provided
            if (!isset($user->status)) {
                $user->status = 0; // Set default value here
            }
        });
    }


}
