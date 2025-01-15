<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    
    protected $fillable = [
        "question",
        "file",
        "tasks_id"
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function answer() {
        
        return $this->hasOne(UploadAnswer::class);

    }

}
