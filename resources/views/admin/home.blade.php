@extends('layouts.app')

@section('content')
<style>
    body {
        overflow: hidden;
        box-sizing: border-box;
        margin: 0;
        padding: 0;

    }
</style>
<div class="container">
    <div class="row text-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="card col-md-6">
            <div class="card-header">
                <h2>Reparaciones</h2>
            </div>

            <div class="card-body ">
                <div class="form-group">
                    <a id="ponerSpin" class="btn btn-dark " href="{{url('admin/admin/reparations')}}"><i class="fas fa-car-crash"></i>
                        Control Reparaciones</a>
                </div>



                <div class="form-group border border-dark p-3 w-50 m-auto">
                    {!! Form::open(array('url'=>'/busca', 'method'=>'get','autocomplete'=>'off'))!!}

                    <input type="text" name="codigoForm" required class="form-control" placeholder="Codigo Matricula">
                    <button class="btn btn-dark mt-3" type="submit"><i class="fas fa-search"></i> Buscar</button>

                </div>
                {!! Form::close()!!}



            </div>
            
        </div>

        <div class="card col-md-6">
            <div class="card-header">
                <h2>Exportaciones e Importaciones</h2>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="{{ route('admin.reparation.export')}}" method="post" class="">
                        @csrf
                        <button type="submit" class="btn btn-dark " data-toggle="tooltip" data-placement="top"
                            title="Exportar reparaciones">Exportar Base de Datos a Excel <i
                                class="fas fa-file-export"></i></button>
                        <input type="hidden" name="searchText" value="">
                    </form>

                </div>
                <div class="form-group">
                    <a class=" " href="{{route('admin.reparation.pdf')}}"><button class="btn btn-dark"
                            data-toggle="tooltip" data-placement="top" title="Exportar reparaciones a PDF">Exportar
                            Reparaciones PDF <i class="fas fa-file-pdf"></i></button></a>

                </div>
                .<div class="form-group border border-dark p-3">
                    <div class="col-md-12 ">
                        <div class="box ">
                            <div class="box-header">
                                <h4 class="box-title">Cargar Datos de Excel</h4>
                            </div><!-- /.box-header -->

                            <div id="notificacion_resul_fcdu">

                            </div>

                            <form id="f_cargar_datos_usuarios" name="f_cargar_datos_usuarios" method="post"
                                action="{{url('admin/admin/importreparations')}} " class="formarchivo"
                                enctype="multipart/form-data">


                                <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">

                                <div class="box-body">

                                    <div class="form-group col-xs-12">
                                        <label for="archivo" class="text-center small">El archivo ha de estar en formato
                                            CSV y
                                            sin linea de cabecera </label>
                                        <input name="archivo" id="archivo" type="file" class="btn btn-dark"
                                            style="max-width: 90%;" required /><br /><br />
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button id="submit" type="submit" class="btn btn-dark"><i class="fas fa-upload">
                                            Subir</i></button>
                                </div>

                            </form>
                        </div>





                    </div>

                </div>






            </div>


        </div>
        <div class="card col-md-12">
                <div class="card-header">
                    <h2>Usuarios</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-dark" href="{{url('admin/admin/users')}}"><i class="fas fa-users-cog"></i>
                            Control Usuarios</a>
                    </div>

                </div>

            </div>




    </div>
</div>




@endsection