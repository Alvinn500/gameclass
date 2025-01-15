<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class uploadAnswer extends Model
{
    
    protected $fillable = [
        'file',
        'upload_id',
        'user_id'
    ];

    public function upload() {
        return $this->belongsTo(Upload::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
