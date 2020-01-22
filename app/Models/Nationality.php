<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model
{
    use SoftDeletes;
    protected $table = 'nationalities';
    protected $fillable = ['name'];

    public function userdetailinfo()
    {
        return $this->hasOne('App\Models\UserDetailInfo', 'nationality_id', 'id');
    }
}
