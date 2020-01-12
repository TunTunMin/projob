<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\models\Prefer_Specialization;

class Role extends Model
{
    use SoftDeletes;
    protected $table = "roles";
    protected $fillable = ['prefer_specializations_id', 'name'];

    public function specializations()
    {
        return $this->belongsTo(Prefer_Specialization::class, 'prefer_specializations_id');
    }
}
