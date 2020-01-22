<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type_id', 'nationality_id', 'address_id', 'race_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // isAdmin
    public function isAdmin($type_id)
    {
        return $type_id == 1;
    }
    // User Detail
    public function userdetails()
    {
        return $this->hasOne('App\Models\UserDetailInfo');
    }
    // experience
    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }
    // education
    public function education()
    {
        return $this->hasMany('App\Models\Education');
    }
    // skill
    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }
}
