<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = ["township_id", "street_id"];

    public function township()
    {
        return $this->belongsTo('App\Models\Township', 'township_id','id');
    }
    public function street()
    {
        return $this->belongsTo('App\Models\Street', 'street_id','id');
    }
}
