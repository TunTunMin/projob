<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Race extends Model
{
    use SoftDeletes;
    protected $table = 'races';
    protected $fillable = ['name'];
}
