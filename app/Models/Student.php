<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $fillable = [
        'score',
        'level',
        'total_xp',
        'user_id',
    ];

}
