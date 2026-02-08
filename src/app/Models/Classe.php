<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Classe extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'promotion',
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_student', 'class_id','student_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'class_teacher', 'class_id', 'teacher_id');
    }
}
