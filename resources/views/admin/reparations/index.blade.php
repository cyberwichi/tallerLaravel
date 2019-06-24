@extends('layouts.app')
@section ('content')

<div class="row mb-3">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center ">
        <h2>Listado de Reparaciones <a href="reparations/create"><button class="btn btn-primary"><i class="fas fa-car-crash"></i> Añadir
            Reparacion</button></a>
</h2>
        
        @include('admin.reparations.search')
        

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
                        <a href="reparations/{{$reparation->id }}/edit"><button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar/Modificar reparacion"><i class="far fa-edit"></i></button></a>
                        <a data-toggle="tooltip" data-placement="top" title="Borrar reparacion"><button data-target="#modal-delete-{{$reparation->id}}" data-toggle="modal"
                                class="btn btn-danger"><i class="fas fa-ban"></i></button></a>


                    </td>

                </tr>
                
                @endforeach

                
            </table>
            {{$reparations->appends(['searchText' => $searchText])->render()}}
        </div>
       


    </div>


</div>


@endsection