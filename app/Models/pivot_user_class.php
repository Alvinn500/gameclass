<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pivot_user_class extends Model
{

    protected $fillable = ['user_id', 'class_id'];

    public function Student()
    {
        $this->belongsTo(Student::class);
    }
}
