<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Street extends Model
{
    use SoftDeletes;
    protected $table = 'streets';
    protected $fillable = ['name'];

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }
}


