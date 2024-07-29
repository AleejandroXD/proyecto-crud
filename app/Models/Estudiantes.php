<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    public function notas()
    {
        return $this->hasMany(Nota::class);// La clase Estudiante tiene una relación de 1 a muchos con Nota, porque un estudiante puede tener más de una nota.
    }
}