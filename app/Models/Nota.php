<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class Nota extends Model
{
    protected $table = 'nota';

    public function estudiantes()
    {
        // La clase Nota tiene una relación de muchos a 1 con Estudiantes, porque cada nota pertenece a un estudiante.
        return $this->belongsTo(Estudiantes::class, "estudiante_id");
    }

    public function materias()
    {
        // La clase Nota tiene una relación de muchos a 1 con Materias, porque cada nota pertenece a una materia.
        return $this->belongsTo(Materia::class, "materias_id");
    }
    
    /**
     * Definimos la funcion como un accesor que modifica los nombre de los valores del
     * atributo.
     * 
     */
    {
    protected function nombreEstudiante(): Attribute
    { 
        return Attribute::make( //Cuando se ejecuta la funcion 
            get: fn ($value) => $this->estudiantes->nombres,//accedemos al valor nombre de estudiantes
        );  
    }

    /**
     *
     */
    protected function nombreMateria(): Attribute//Definimos la funcion como un accesor que modifica los nombre de los valores del atributo.
    {
        return Attribute::make(//Cuando se ejecuta la funcion 
            get: fn ($value) => $this->materias->nombre,//accedemos al valor nombre de materias
        );  
    }

    /**
     * Agregamos los parametros con el tipo de dato
     * le damos la propiedad static para no instanciar a la funcion.
     * 
     * @param int $estudiante_id ID del estudiante
     * @param int $materias_id ID de la materia
     * 
     * @return bool
     */
    public static function existeNota(int $estudiante_id, int $materias_id): bool
    {
        //Busca si existe el estudiante
        $existeNota = DB::table('nota')->where('estudiante_id', $estudiante_id)
              ->where('materias_id', $materias_id)//Busca si existe la materia 
              ->exists();//Si las dos cosas existen al mismo tiempo entonces $existeNota es true

        return $existeNota;
    }
}