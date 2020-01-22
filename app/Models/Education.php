<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;
    protected $table = "educations";
    protected $fillable = ['institute_university', 'graduate_date', 'qualification_id', 'institute_location_id', 'field_study_id', 'major', 'grade', 'additional_info', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function field_study()
    {
        return $this->belongsTo('App\Models\FieldStudy', 'field_study_id', 'id');
    }

    public function qualification()
    {
        return $this->belongsTo('App\Models\Qualification', 'qualification_id', 'id');
    }
}
