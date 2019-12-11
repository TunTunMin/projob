<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JobSpecification extends Model
{
    use SoftDeletes;
    protected $table = "job_specifications";
    protected $fillable = ['name','link'];
}
