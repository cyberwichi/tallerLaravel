@extends('layouts.app')
@section ('content')

<div class="row mb-3">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center ">
        <h2>Listado de Reparaciones <a href="reparations/create"><button class="btn btn-secondary"><i
                        class="fas fa-car-crash"></i> Añadir
                    Reparacion</button></a>
        </h2>

        @include('admin.reparations.search')


    </div>




</div>
<div class="row">
    <div class="col-12">
        <div class="">
            {{$reparations->appends(['searchText' => $searchText])->render()}}
            <table class="table table-bordered">
                <thead>
                    <th scope="col">ID</th>
                    <th>MATRICULA</th>
                    <th>CODIGO</th>
                    <th scope="col">REPARACION</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">KILOMETROS</th>
                    <th>ACCIONES</th>
                </thead>

                @foreach ($reparations as $reparation)
                @include('admin.reparations.modal')
                <?php
                    $matr=Str_split($reparation->matricula ,1);
                    $final="";
                    for ($a=0;$a<count($matr);$a++){
                        $final .= ord($matr[$a]);		
                    }
                    ?>


                <tr>
                    <td class="">{{$reparation->id}} </td>
                    <td class="">{{strtoupper($reparation->matricula)}} </td>
                    <td class="">{{$final}} </td>
                    <td>{{strtoupper($reparation->desrepara)}} </td>
                    <td class="">{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                    <td class="">{{strtoupper($reparation->kilometros)}} </td>
                    <td>
                        <a href="reparations/{{$reparation->id }}/edit"><button class="btn btn-primary btn-sm"
                                data-toggle="tooltip" data-placement="top" title="Editar/Modificar reparacion"><i
                                    class="far fa-edit"></i></button></a>
                        <a data-toggle="tooltip" data-placement="top" title="Borrar reparacion"><button
                                data-target="#modal-delete-{{$reparation->id}}" data-toggle="modal"
                                class="btn btn-secondary btn-sm"><i class="fas fa-ban"></i></button></a>


                    </td>

                </tr>

                @endforeach


            </table>
            {{$reparations->appends(['searchText' => $searchText])->render()}}


            @include('admin.reparations.modal2')
            @include('admin.reparations.modal3')

            <a data-toggle="tooltip" data-placement="top" title="Borrar reparaciones listadas"><button
                    data-target="#modal-borrado-lista" data-toggle="modal" class="btn btn-secondary">Borrar Todas las
                    Reparaciones Listadas <i class="fas fa-ban"></i></button></a>

            <a data-toggle="tooltip" data-placement="top" title="Borrar TODO EXCEPTO las reparaciones listadas"><button
                    data-target="#modal-borrado-lista2" data-toggle="modal" class="btn btn-secondary">Borrar TODO EXCEPTO las
                    Reparaciones Listadas <i class="fas fa-ban"></i></button></a>


            <a class=" " href="/admin/admin/pdf/{{$searchText}}"><button class="btn btn-secondary" data-toggle="tooltip"
                    data-placement="top" title="Exportar reparaciones a PDF">Exportar Listado Actual PDF <i
                        class="fas fa-file-export"></i></button></a>

        </div>



    </div>


</div>


@endsection