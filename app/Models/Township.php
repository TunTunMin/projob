<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Township extends Model
{
    use SoftDeletes;
    protected $table = 'townships';
    protected $fillable = ['name'];

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }
}
