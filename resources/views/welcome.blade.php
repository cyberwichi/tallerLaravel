<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ route('admin.home') }}">Inicio</a>
            @else
            <a href="{{ route('login') }}">Acceso</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Nuevo Usuario</a>
            @endif
            @endauth
        </div>
        @endif



        <div class="content">
            <div class="title m-b-md">
                Taller
            </div>
            {!! Form::open(array('url'=>'/busca', 'method'=>'get','autocomplete'=>'off'))!!}
            

            <div class="form-group">
                <label for="codigoForm">Codigo</label>
                <input id="codigoForm" type="text" name="codigoForm" required value="" class="form-control"
                    placeholder="Codigo de Matricula">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Buscar</button>
               
            </div>
            {!! Form::close()!!}




        </div>
    </div>

</body>

</html>