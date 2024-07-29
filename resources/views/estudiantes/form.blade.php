@extends('layouts.app')
<style>
    .formulario, form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    input, button, a{
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
        <div class="formulario">
            <h1 class='text-center'>Agregar estudiante:</h1>
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
            <form action="{{ route('estudiantes.index') }}" method="POST">
                @csrf
                <input type="text" name="nombres" placeholder='nombre estudiante'>
                <input type="number" name="dni" placeholder='dni estudiante'>
                <button type='submit' class='btn btn-primary'>Cargar Estudiante</button>
            </form>
        </div>
        <hr>
        <div class="row resultados">
            <table>
                <tr class="claves">
                    <td class="clave">Estudiante</td>
                    <td class="clave">DNI Estudiante</td>
                </tr>
                @foreach($estudiantes as $estudiante)
                <tr>
                    <td class="valor">{{$estudiante->nombres}}</td>
                    <td class="valor">{{$estudiante->dni}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="{{url('/')}}">← Regresar</a>
        </div>
    @endsection

