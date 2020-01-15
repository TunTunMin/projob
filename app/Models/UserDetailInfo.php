<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetailInfo extends Model
{
    protected $table = "user_detail_infos";
    protected $fillable = ['nationality_id', 'current_resident_id', 'permanent_resident_id', 'monthly_salary', 'currency_unit', 'working_since', 'specializations_id', 'preferwork_location_id', 'user_id', 'address_id', 'race_id', 'role_id'];

    // User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
