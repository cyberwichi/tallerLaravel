@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body  text-center ">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a class="btn btn-primary" href="{{url('admin/admin/users')}}">Control Usuarios</a>
                    <a class="btn btn-primary" href="{{url('admin/admin/reparations')}}">Control Reparaciones</a>

                    <div class="col-md-12 mt-5">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Cargar Datos de Excel</h3>
                            </div><!-- /.box-header -->

                            <div id="notificacion_resul_fcdu">
                              
                            </div>

                            <form id="f_cargar_datos_usuarios" name="f_cargar_datos_usuarios" method="post"
                                action="{{url('admin/admin/importreparations')}} " class="formarchivo" enctype="multipart/form-data">


                                <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">

                                <div class="box-body">

                                    <div class="form-group col-xs-12">
                                        <label for="archivo" class="text-center">El archivo ha de estar en formato CSV y sin linea de cabecera <br>Maximo 500 registros por fichero</label>
                                        <input name="archivo" id="archivo" type="file" class="btn btn-success "
                                            required /><br /><br />
                                    </div>
                                    
                                </div>
                                <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Cargar Datos</button>
                                    </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection