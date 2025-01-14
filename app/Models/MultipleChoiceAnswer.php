<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleChoiceAnswer extends Model
{
    
    protected $fillable = [
        "answer",'is_correct','multiple_choice_id','user_id','task_id'
    ];

    public function multipleChoice() {
        return $this->belongsTo(MultipleChoice::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
