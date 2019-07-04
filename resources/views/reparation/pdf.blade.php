<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Reparaciones</title>
    <link href="https://www.fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }

        td {
            font-size: 14px;


        }

        .table {
            width: 100%;
        }

        .headtable {

            border: 1px solid #000000;


        }

        .linea {
            border: 1px solid #000000;

        }
        td {
            border-bottom: .5px solid #777;

        }
        @page { margin: 50px 32px 80px 32px; }
        
        #footer { margin-top:50px; position: fixed; left: 0px; bottom: -180px; right: 0px; height: 165px;}
        #footer .page:after { content: counter(page, decimal);}
    </style>
</head>

<body>
    <h1>Listado de Reparaciones Matricula: {{$searchText}}</h1>

    <div id="footer">
            <div align="center" style="font-size:11px;">Listado de reparaciones matricula: {{$searchText}}</div>
            <div style="font-size:11px;">Total de Registros Listados {{$reparations->count()}}</div>
            <div align="right" class="page" style="font-size:13px;">Pag: </div>
         </div>


    <table class="table">


        <thead class="headtable">

            <tr>
                <th>Reparacion</th>
                <th> Fecha </th>
                <th>Kilometros</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reparations as $reparation)

            <tr>
                <td>{{strtoupper($reparation->desrepara)}} </td>
                <td>{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                <td>{{strtoupper($reparation->kilometros)}} </td>
            </tr>

            @endforeach



        </tbody>



    </table>
 


</body>

</html>