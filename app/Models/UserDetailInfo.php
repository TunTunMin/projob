<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetailInfo extends Model
{
    protected $table = "user_detail_infos";
    protected $fillable = ['current_resident', 'permanent_resident', 'monthly_salary', 'prefer_specializations_id', 'preferwork_location_id', 'working_since', 'institute_university', 'institute_locations_id', 'qualification_id', 'field_studies_id', 'graduation_date', 'position_title', 'company_name', 'job_duration_from', 'job_duration_to', 'specialization', 'role_id', 'industries_id', 'position_level', 'phone_no', 'user_id', 'type_id', 'nationality_id',  'address_id', 'race_id', 'currency_unit'];
}
