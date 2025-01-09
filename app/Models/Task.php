<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        "title",
        "type",
        'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function multipleChoices() {
        return $this->hasMany(MultipleChoice::class, 'tasks_id');
    }

}
