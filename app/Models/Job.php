<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $table = "jobs";
    protected $fillable = ['company_id', 'job_type_id', 'title', 'post_date', 'job_highlights', 'job_description', 'career_level', 'qualification', 'employee_type', 'salary_unit', 'salary_from', 'salary_to', 'specialization_id'];

    public function getCompany()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
    public function getJobType()
    {
        return $this->belongsTo('App\Models\JobType', 'job_type_id', 'id');
    }
    public function getSpecialization()
    {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id', 'id');
    }
}
