@extends('layouts.app')
@section ('content')

<div class="row mb-3">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center ">
        <h2>Listado de Reparaciones</h2>


    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="">
            <table class="table table-bordered">
                <thead>
                    <th scope="col">Reparacion</th>
                    <th scope="col"> Fecha </th>
                    <th scope="col">Kilometros</th>
                </thead>

                @foreach ($reparations as $reparation)


                <tr>
                    <td>{{$reparation->desrepara}} </td>
                    <td class="">{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                    <td class="">{{$reparation->kilometros}} </td>
                </tr>

                @endforeach


            </table>
        </div>
        <?php
            $matr=Str_split($reparation->matricula ,1);
            $final="";
            for ($a=0;$a<count($matr);$a++)
            {$final .= ord($matr[$a]).'*';}
            
        
        ?>
        {{$reparations->appends(['codigoForm' => $final])->render()}}


    </div>


</div>


@endsection