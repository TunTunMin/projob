<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public function experience()
    {
        return $this->hasOne('App\Models\Experience');
    }
}
