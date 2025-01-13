<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    
    protected $fillable = [
        'question', 
        'image',
        'tasks_id'
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function answers() {
        return $this->hasMany(EssayAnswer::class);
    }

}
