<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;
    protected $table = "languages";
    protected $fillable = ['language_id', 'spoken', 'written', 'user_id'];
}
