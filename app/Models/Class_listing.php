<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_listing extends Model
{

    protected $fillable = ['study_name', 'class', 'logo_class', 'school_name', 'total_lesson', 'total_materi', 'total_quiz', 'total_student', 'joined_student'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'pivot_user_classes', 'class_listing_id', 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function activity() {
        return $this->hasMany(Activity::class, 'class_id');
    }

    public function scores() {
        return $this->hasMany(ClassScore::class, 'class_id');    
    }

}
