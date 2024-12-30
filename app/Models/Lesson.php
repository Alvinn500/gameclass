<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    protected $fillable = ['name', 'class_listing_id'];

    public function class() {
        return $this->belongsTo(Class_listing::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
