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

    public function task() {
        return $this->belongsTo(Task::class);
    }
    
    protected $casts = [
        "options" => 'array'
    ];

}
