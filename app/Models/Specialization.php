<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use SoftDeletes;
    protected $table = "specializations";
    protected $fillable = ['name', 'link'];

    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
