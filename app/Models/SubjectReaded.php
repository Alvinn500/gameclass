<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectReaded extends Model
{
    
    protected $fillable = [
        'is_readed',
        'score',
        'subject_id',
        'user_id',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
