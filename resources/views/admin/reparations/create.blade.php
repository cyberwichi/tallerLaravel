@extends('layouts.admin')  
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Nueva Reparacion </h2>
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
        {!! Form::open(array('url'=>'reparation', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="idcarForm">Matricula</label>
            <select name="idcarForm" class="form-control">
                @foreach ($matriculas as $matricula )
                <option value="{{$matricula->idcar}}">{{$matricula->matricula}} </option>

                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="desreparaForm">Desrepara</label>
            <input type="text" name="desreparaForm" required value="{{old('desreparaForm')}} " class="form-control"
                placeholder="Descripcion de reparacion">
        </div>
        <div class="form-group">
            <label for="fechaForm">fecha</label>
            <input type="date" name="fechaForm" required value="{{old('fechaForm')}} " class="form-control"
                placeholder="fecha">
        </div>
        <div class="form-group">
            <label for="kilometrosForm">kilometros</label>
            <input type="text" name="kilometrosForm" class="form-control" required value="{{old('kilometrosForm')}} "
                placeholder="kilometros">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('reparation')}} "><button class="btn btn-danger" type="button" >Cancelar</button>
            </a>

        </div>






        {!! Form::close()!!}

    </div>
</div>
@endsection
