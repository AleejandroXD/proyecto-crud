<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        .container{
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .btn{
            margin-top: 20px;
        }
    </style>

</head>
<body class="">
        <div class="container">
            @yield('content')
            <div class="row">
                <h1>Notas Estudiantes</h1>
            </div>
            <div class="row">
                <a class="agregar-alumno btn btn-primary" href="{{url('/estudiantes')}}">Agregar Alumno</a>
                <a class="agregar-nota btn btn-primary" href="{{url('/notas')}}">Agregar Nota</a>
            </div>
        </div>
</body>

</html>
