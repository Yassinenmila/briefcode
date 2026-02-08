<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_sprint', 'sprint_id', 'competence_id');
    }
}
