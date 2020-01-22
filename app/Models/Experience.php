<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;
    protected $table = "experiences";
    protected $fillable = ['position_title', 'company_name', 'job_duration_from', 'job_duration_to', 'specializations_id', 'role_id', 'industries_id', 'position_level', 'currency_unit', 'monthly_salary', 'experience_description', 'user_id', 'phone_no'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization', 'specializations_id', 'id');
    }

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industries_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
