<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $table = "companies";
    protected $fillable = ['name', 'company_overview', 'register_no', 'ea_no', 'company_size', 'industry', 'location', 'average_processtime', 'benefit_other', 'gallery', 'cover_photo', 'logo', 'type_id', 'ea_register_no'];

    protected $gallery = [
        'gallery' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000' // max 10000kb
    ];
    // public function job()
    // {
    //     return $this->hasOne('App\Models\Job');
    // }
    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
