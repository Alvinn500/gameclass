<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoryGameAnswer extends Model
{
    
    protected $fillable = [
        'answers',
        'user_id',
        'memory_game_id',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    public function memoryGame() {
        return $this->belongsTo(MemoryGame::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
