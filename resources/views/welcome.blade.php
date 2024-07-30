@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="grid grid-flow-col">
            <h1 class="text-2xl">Notas Estudiantes</h1>
        </div>
        <div class="row">
            <a class="agregar-alumno rounded-md bg-sky-600 text-white p-2" href="{{url('/estudiantes')}}">Agregar Alumno</a>
            <a class="agregar-nota rounded-md bg-sky-600 text-white p-2" href="{{url('/notas')}}">Agregar Nota</a>
        </div>
    </div>
@endsection