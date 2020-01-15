<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\models\Specialization;

class Role extends Model
{
    use SoftDeletes;
    protected $table = "roles";
    protected $fillable = ['specialization_id', 'name'];

    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
}
