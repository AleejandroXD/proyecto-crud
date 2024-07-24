<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes; 

class EstudiantesController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('get')){ //Si es un pedido get.
            $estudiantes = Estudiantes::all(); //Consulto la tabla estudiantes y guarda los datos en la variable
            //Retorno en la vista form en el campo 'estudiantes' con los datos guardados.
            return view('estudiantes.form', ['estudiantes' => $estudiantes]); 
        }
        else{ //si el pedido es post
            $request->validate([ //validamos los datos ingresados de los inputs nombre y dni
                'nombres' => 'required|string|max:255',
                'dni' => 'required|numeric|unique:estudiantes,dni'
            ]); //Si valida crea un objteto en la tabla Estudiantes
            $estudiante = new Estudiantes;
            $estudiante->nombres = $request->nombres; //en el campo nombre de la tabla, guarda el pedido del input nombre
            $estudiante->dni = $request->dni;

            if($estudiante->save()){ //Si se guarda un nuevo $estudiante en la tabla

                $estudiantes = Estudiantes::all();//Consulto nuevamente la tabla

                return view('estudiantes.form', ['estudiantes' => $estudiantes]);//Vuelve a cargar la vista con los Estudiantes actualizados utilizando los datos de la variable
            }

            return 'error'; //Si no retorna error
        }
    }
}
