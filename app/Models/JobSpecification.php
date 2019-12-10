<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSpecification extends Model
{
    protected $table = "job_specifications";
    protected $fillable = ['name','link'];
}
