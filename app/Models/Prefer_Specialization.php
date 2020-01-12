<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prefer_Specialization extends Model
{
    use SoftDeletes;
    protected $table = "prefer_specializations";
    protected $fillable = ['name'];

    public function roles()
    {
        return $this->hasMany('App\Moels\Role');
    }
}
