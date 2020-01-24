<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetailInfo extends Model
{
    protected $table = "user_detail_infos";
    protected $fillable = ['nationality_id', 'current_resident_id', 'permanent_resident_id', 'monthly_salary', 'currency_unit', 'working_since', 'specializations_id', 'preferwork_location_id', 'user_id', 'address_id', 'race_id', 'role_id', 'profile', 'resume'];

    // User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function townships()
    {
        return $this->belongsTo('App\Models\Township', 'preferwork_location_id', 'id');
    }
    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality');
    }
    public function permentresident()
    {
        return $this->belongsTo('App\Models\Nationality', 'permanent_resident_id', 'id');
    }
    public function permanentresident()
    {
        return $this->belongsTo('App\Models\Township', 'permanent_resident_id', 'id');
    }
}
