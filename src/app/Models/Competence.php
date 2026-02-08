<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'code',
        'description',
        'type'
    ];

    public function sprints()
    {
        return $this->belongsToMany(Sprint::class, 'competence_sprint', 'competence_id', 'sprint_id');
    }
}
