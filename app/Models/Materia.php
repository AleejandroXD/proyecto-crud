<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Materia extends Model
{
    protected $table = 'materias';//Pasamos el nombre de la tabla para que no pase a singular el nombre. 

    public function notas()
    {
        return $this->hasMany(Nota::class);// La clase Materia tiene una relación de 1 a muchos con Nota, porque una materia puede tener más de una nota.
    }

}