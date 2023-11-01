<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    // relationship
    function user_type(){
        return $this->belongsTo(User_type::class);
    }

    function admin(){
        return $this->hasOne(Admin::class);
    }

    function staff(){
        return $this->hasOne(Staff::class);
    }

    function customer(){
        return $this->hasOne(Customer::class);
    }

    function supplier(){
        return $this->hasOne(Supplier::class);
    }

    function products(){
        return $this->belongsToMany(Product::class);
    }

    function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    function permission_users(){
        return $this->belongsToMany(Permission_user::class);
    }

}
