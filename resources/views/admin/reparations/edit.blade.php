@extends('/layouts.app')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Editar Reparacion: {{$reparation->idreparation}} </h2>
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
        {!! Form::model($reparation, ['method'=>'PATCH','route'=>['admin.reparations.update', $reparation->id]])!!}
        {{Form::token()}}

        <div class="form-group">
                
            <div class="form-group">
                <label for="matriculaForm">Matricula</label>
                <input type="text" name="matriculaForm" class="form-control" value="{{$reparation->matricula}}">
            </div>
        <div class="form-group">
            <label for="desreparaForm">Desrepara</label>
            <input type="text" name="desreparaForm" class="form-control" value="{{$reparation->desrepara}}">
        </div>
        <div class="form-group">
            <label for="fechaForm">fecha</label>
            <input type="date" name="fechaForm" class="form-control" value="{{$reparation->fecha}}">
        </div>
        <div class="form-group">
            <label for="kilometrosForm">kilometros</label>
            <input type="text" name="kilometrosForm" class="form-control" value="{{$reparation->kilometros}}">
        </div>
        <div class="form-group">
                <button class="btn btn-primary" type="submit" ><i class="fas fa-cloud-upload-alt"></i></button>
        <a href="{{url('admin/admin/reparations')}} "><button class="btn btn-danger" type="button" ><i class="fas fa-ban"></i></button>
        </a>

            </div>






        {!! Form::close()!!}

    </div>
</div>
@endsection
