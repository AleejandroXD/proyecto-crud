<?php
namespace App\Http\Controllers;

use App\Models\Materia; //Utilizamos el modelo materia para consultar los datos de la tabla.
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function showForm()
    {
        //Consulta la tabla Materias y las guarda la variable.
        $materia = Materia::all();

        //Retornamos los datos de la variable materias y las devolvemos en el select con el mismo nombre. 
        return view('form', ['materias' => $materia]); 
    }
}