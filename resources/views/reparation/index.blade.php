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
                 
                    <th>Matricula</th>                    
                    <th scope="col">Desrepara</th>
                    <th scope="col">  Fecha </th>
                    <th scope="col">Kilometros</th>                    
                </thead>

                @foreach ($reparations as $reparation)
               
               
                <tr>
                    
                    <td class="">{{$reparation->matricula}} </td>
                    
                    <td >{{$reparation->desrepara}} </td>
                    <td  class="">{{Carbon::parse($reparation->fecha)->formatLocalized('%d %m %Y')}} </td>
                    <td  class="">{{$reparation->kilometros}} </td>
                    
                </tr>

                @endforeach


            </table>
        </div>
        {{-- {{$reparations->render()}} --}}


    </div>


</div>


@endsection