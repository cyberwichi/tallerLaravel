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
                    <th scope="col">ID</th>
                    <th>Matricula</th>
                    <th>Codigo</th>
                    <th scope="col">Desrepara</th>
                    <th scope="col"> Fecha </th>
                    <th scope="col">Kilometros</th>
                    <th>Editar / Borrar</th>
                </thead>

                @foreach ($reparations as $reparation)
                @include('admin.reparations.modal')
                <?php
                    $matr=Str_split($reparation->matricula ,1);
                    $final="";
                    for ($a=0;$a<count($matr);$a++){
                        $final .= ord($matr[$a]).'*';		
                    }
                    ?>


                <tr>
                    <td class="">{{$reparation->id}} </td>
                    <td class="">{{$reparation->matricula}} </td>
                    <td class="">{{$final}} </td>
                    <td>{{$reparation->desrepara}} </td>
                    <td class="">{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                    <td class="">{{$reparation->kilometros}} </td>
                    <td>
                        <a href="reparations/{{$reparation->id }}/edit"><button class="btn btn-info">Editar</button></a>
                        <a><button data-target="#modal-delete-{{$reparation->id}}" data-toggle="modal"
                                class="btn btn-danger">Borrar</button></a>


                    </td>

                </tr>

                @endforeach


            </table>
        </div>
        {{$reparations->render()}}


    </div>


</div>


@endsection