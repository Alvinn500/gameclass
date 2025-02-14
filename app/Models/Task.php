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

    public function multipleChoiceAnswers() {
        return $this->hasMany(MultipleChoiceAnswer::class);
    }

    public function essays() {
        return $this->hasMany(Essay::class, 'tasks_id');
    }

    public function essayScores() {
        return $this->hasMany(EssayScore::class);
    }

    public function upload() {
        return $this->hasOne(Upload::class, 'tasks_id');
    }

    public function memoryGames() {
        return $this->hasMany(MemoryGame::class);
    }

    public function memoryGameScores() {
        return $this->hasMany(MemoryGameScore::class);
    }
}
