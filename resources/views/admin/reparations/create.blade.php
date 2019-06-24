@extends('layouts.app')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-center">Nueva Reparacion </h2>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                <li>
                    {{ $error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(array('url'=>'admin/admin/reparations', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="matriculaForm">Matricula</label>
            <input type="text" name="matriculaForm" required value="{{old('matriculaForm')}}" class="form-control"
               >
        </div>
        <div class="form-group">
            <label for="desreparaForm">Reparacion</label>
            <input type="text" name="desreparaForm" required value="{{old('desreparaForm')}} " class="form-control"
                placeholder="Descripcion de reparacion">
        </div>
        <div class="form-group">
            <label for="fechaForm">Fecha</label>
            <input type="date" name="fechaForm" required value="{{old('fechaForm')}} " class="form-control"
                placeholder="fecha">
        </div>
        <div class="form-group">
            <label for="kilometrosForm">kilometros</label>
            <input type="text" name="kilometrosForm" class="form-control" required value="{{old('kilometrosForm')}} "
                placeholder="kilometros">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fas fa-cloud-upload-alt"></i></button>
            <a href="{{url('admin/admin/reparations')}} "><button class="btn btn-danger" type="button"><i class="fas fa-ban"></i></button>
            </a>
        </div>






        {!! Form::close()!!}

    </div>
</div>
@endsection