<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoryGameScore extends Model
{
    
    protected $fillable = [
        'score',
        'XP',
        'comment',
        'status',
        'class_id',
        'task_id',
        'user_id',
    ];

    public function class() {
        return $this->belongsTo(Class_listing::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
