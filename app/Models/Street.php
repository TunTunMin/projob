<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Hash;

class Street extends Model
{
    protected $table = 'streets';
    protected $fillable = ['name'];
}
class Post extends Model
{
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' .$searchTerm. '%');
    }
}

