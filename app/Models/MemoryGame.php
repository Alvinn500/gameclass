<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoryGame extends Model
{
    
    protected $fillable = [
        'images',
        'task_id'
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

    protected $casts = [
        "images" => 'array',
        "questions" => 'array'
    ];

    public function answers() {
        return $this->hasMany(MemoryGameAnswer::class);
    }

}
