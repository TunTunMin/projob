<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;
    protected $table = "experiences";
    protected $fillable = ['position_title', 'company_name', 'job_duration_from', 'job_duration_to', 'specailizations_id', 'role_id', 'industries_id', 'position_level', 'currency_unit', 'monthly_salary', 'experience_description'];
}
