<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
    protected $fillable = [
        'description',
        'user_id',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(Class_listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
