<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class uploadScore extends Model
{
    
    protected $fillable = [
        "score",
        "XP",
        "comment", 
        "status",
        "upload_id",
        "user_id",
        "class_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function class() {
        return $this->belongsTo(Class_listing::class);
    }

}
