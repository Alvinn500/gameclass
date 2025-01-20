<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EssayAnswer extends Model
{
    
    protected $fillable = [
        'answer',
        'user_id',
        'essay_id',
    ];

    public function essay()
    {
        return $this->belongsTo(Essay::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function score() {
        return $this->belongsTo(EssayScore::class);
    }

}
