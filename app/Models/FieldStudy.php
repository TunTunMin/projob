<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldStudy extends Model
{
    use SoftDeletes;
    protected $table = "field_studies";
    protected $fillable = ['name'];
}
