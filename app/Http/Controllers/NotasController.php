<?php
namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Nota;
use App\Models\Estudiantes;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index(Request $request)
    {
        // Consulto los datos de Estudiantes y Materias y guardo los datos en las variables.
        $estudiantes = Estudiantes::all();
        $materias = Materia::all();
        $notas = Nota::all();//Consulta Nota y guarda los datos en la variable.

        if($request->isMethod('get')){//Si el pedido es get.

            return view('notas.notas', ['notas' => $notas, 'estudiantes' => $estudiantes, 'materias' => $materias]);//Retorna los datos en la vista notas con los datos de las 3 variables guardadas.

        }
        
        if($request->isMethod('post')){//Si es pedido es post.

            $request->validate([ // validamos los datos ingresados de los inputs nota y los inputs seleccionados en estudiante y materias que se seleccionan como id
                'nota' => 'required|numeric|min:0|max:10',
                'estudiante_id' => 'required|numeric',
                'materias_id' => 'required|numeric'
            ]);// este metodo si falla automaticamente devuelve un mensaje de error

            if (Nota::existeNota($request->estudiante_id,$request->materias_id)) { //Si existeNota es true
                return redirect()->back()->withErrors(['message' => 'El estudiante ya tiene una nota en esta materia.']);//Regreso a la pagina y muestro el error en la piscina de errores.
            }else{
                // Si no existe, crear una nueva nota
                $nota = new Nota; // Crea una nueva nota y sus parametros
                $nota->nota = $request->nota;
                $nota->estudiante_id = $request->estudiante_id; // Utilizamos los campos de la tabla y guardamos los datos del pedido del input correspondiente.
                $nota->materias_id = $request->materias_id;

                if($nota->save()){// Guarda un nuevo objeto y actualiza la variable $nota.
                    $notas = Nota::all(); //llamo a todas las notas
                    return redirect()->route('notas.index', ['notas' => $notas, 'estudiantes' => $estudiantes, 'materias' => $materias])->with('success', 'Nota agregada');
                }else{
                    return redirect()->back()->withErrors(['message' => 'Error al cargar nota']);//Regreso a la pagina y muestro el error en la piscina de errores.
                }
            }
        }
        return abort(403);
    }
}