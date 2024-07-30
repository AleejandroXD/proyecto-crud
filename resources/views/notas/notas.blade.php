
@extends('layouts.app')
<style>
    .formulario, form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 20px !important;
    }
    input, button, a, select{
        margin-top: 20px!important;
        width: 300px;
    }
    .claves{
        background-color: gray;
        color: #fff;
    }
    .clave, .valor{
        padding: 10px;
        border: 1px solid black;
    }
</style>
 @section('content')
        <div class="row formulario">
            <h1 class='text-center'>Agregar nota de estudiantes:</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('notas.index') }}" method="POST">
                @csrf
                    <select name="estudiante_id" id="">
                    @foreach($estudiantes as $estudiante)
                        <option value="{{$estudiante->id}}" >{{$estudiante->nombres}}</option>
                    @endforeach
                    </select>
                    <select id="" name="materias_id">
                    @foreach($materias as $materia)
                        <option value="{{$materia->id}}" >{{$materia->nombre}}</option>
                    @endforeach
                    </select>
                <input type="number" step="0.1" min="0" max="10" name="nota" placeholder="Nota">
                <button type="submit" class="rounded-md bg-sky-600 text-white p-2">Cargar Nota</button>
            </form>
        </div>
        <hr>
        <div class="row resultados">
            <table class="bg-slate-50 dark:bg-slate-700">
                <tr class="claves">
                    <td class="clave">Estudiante</td>
                    <td class="clave">Materia</td>
                    <td class="clave">Nota</td>
                </tr>
                @foreach($notas as $nota)
                <tr>
                    <td class="valor">{{$nota->nombreEstudiante}}</td>
                    <td class="valor">{{$nota->nombreMateria}}</td>
                    <td class="valor">{{$nota->nota}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <a class="rounded-md bg-green-600 text-white p-2" href="{{url('/')}}">← Regresar</a>
        </div>

    @endsection
