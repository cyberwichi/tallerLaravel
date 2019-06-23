{!! Form::open(array('url'=>'reparation', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'
,'class'=>'form-inline'))!!}

<div class="input-group col-12 ">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-primary input-group-text">Buscar </button>
        <input type="text" id="inlineFormInputGroup" class="form-control col-8" name="searchText"
            placeholder="Buscar..." value="{{$searchText}}">


    </div>
</div>

{{ Form::close() }}
