<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EssayScore extends Model
{
    
    protected $fillable = [
        'score',
        'XP',
        'status',
        'task_id',
        'user_id',
        'class_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
