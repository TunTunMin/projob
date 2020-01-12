<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    use SoftDeletes;
    protected $table = 'qualifications';
    protected $fillable = ['name'];
}
