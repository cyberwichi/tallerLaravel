{!! Form::open(array('url'=>'admin/admin/reparations', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'
,'class'=>'form-inline'))!!}

<div class="input-group col-12 mt-3">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-primary input-group-text">Buscar <i class="fas fa-search ml-1"> </i></button>
        <input type="text" id="inlineFormInputGroup" class="form-control col-8" name="searchText"
            value="{{old($searchText)}}">
    </div>
    

</div>
<div class="small text-center ml-3 mb-3">
        <span class=""> Busquedas por fecha en formato AAAA-MM-DD</span>
       

</div>

{{ Form::close() }}
