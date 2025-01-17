<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassScore extends Model
{
    
    protected $fillable = [
        'score', 'class_id', 'user_id'
    ];

    public function class() {
        return $this->belongsTo(Class_listing::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
