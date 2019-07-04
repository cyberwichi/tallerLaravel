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
            text-align: center;
            font-family: 'Roboto', sans-serif;

        }

        td {
        
            font-size: 13px;


        }

        .table {
            width: 100%;
        }

        .headtable {

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
        <h1>LISTADO DE REPARACIONES</h1>
        <h4>CONCEPTO BUSCADO: {{$searchText}}</h4>
       
        <div id="footer">
                <div align="center" style="font-size:11px;">Listado de reparaciones concepto buscado: {{$searchText}}</div>
                <div style="font-size:11px;">Total de Registros Listados {{$reparations->count()}}</div>
                <div align="right" class="page" style="font-size:13px;"><strong>Pag:</strong></div>
                
             </div>
            
   
  
    <table class="table">
            
        <thead class="headtable">
               
            <tr>
                <th>ID</th>
                <th>MATRICULA</th>
                <th>CODIGO</th>
                <th>REPARACION</th>
                <th>FECHA</th>
                <th>KILOMETROS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reparations as $reparation)

            <tr>
                <?php
                    $matr=Str_split($reparation->matricula ,1);
                    $final="";
                    for ($a=0;$a<count($matr);$a++){
                    $final .= ord($matr[$a]);		
                    }
                    ?>
                <td>{{$reparation->id}} </td>                
                <td>{{strtoupper($reparation->matricula)}} </td>
                <td>{{$final}} </td>
                <td>{{strtoupper($reparation->desrepara)}} </td>
                <td>{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                <td>{{strtoupper($reparation->kilometros)}} </td>
                

            </tr>

            @endforeach



        </tbody>



    </table>


</body>

</html>