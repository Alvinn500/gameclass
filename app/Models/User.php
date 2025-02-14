<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function classes()
    {
        return $this->belongsToMany(Class_listing::class, 'pivot_user_classes', 'user_id', 'class_listing_id');
    }

    public function SubjectReadeds() {
        return $this->hasMany(SubjectReaded::class);
    }

    public function multipleChoiceAnswers() {
        return $this->hasMany(MultipleChoiceAnswer::class);
    }

    public function essayAnswers() {
        return $this->hasMany(EssayAnswer::class);
    }

    public function essayScores() {
        return $this->hasMany(EssayScore::class);
    }

    public function uploadAnswers() {
        return $this->hasMany(UploadAnswer::class);
    }

    public function uploadScores() {
        return $this->hasMany(UploadScore::class);
    }

    public function uploadScore() {
        return $this->hasOne(UploadScore::class);
    }

    public function activity() {
        return $this->hasMany(Activity::class);
    }
 
    public function classScores() {
        return $this->hasMany(ClassScore::class);
    }

    public function memoryGameAnswers() {
        return $this->hasMany(MemoryGameAnswer::class);
    }

    public function memoryGameScores() {
        return $this->hasMany(MemoryGameScore::class);
    }

}
