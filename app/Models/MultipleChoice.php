<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model
{

    protected $table = 'multiple_choices';


    protected $fillable = [
        'question', 
        'options', 
        'answer',
        'image',
        'tasks_id' 
    ];

    protected $casts = [
        "options" => 'array'
    ];
    
    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function answers() {
        return $this->hasMany(MultipleChoiceAnswer::class);
    }    

}
