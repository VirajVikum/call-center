<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    // protected $table = 'ac_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guard_name = 'web';
}
