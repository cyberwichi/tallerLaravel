@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Usuarios del Sistema</div>

        <div class="card-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Autorizado</th>
                <th scope="col">Acciones</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user )
              @include('admin.users.modal')
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
               
                <td>
                    @if ($user->roles()->get()->pluck('name')->toArray())
                    SI
                    @else
                    NO
                    @endif
                  
                  {{-- {{ implode('. ',$user->roles()->get()->pluck('name')->toArray()) }} --}}
                </td>
                <td>
                  <a href="{{route('admin.users.edit', $user->id)}} ">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar/Modificar Usuario"><i class="far fa-edit"></i></button>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"><button data-target="#modal-delete-{{$user->id}}" data-toggle="modal"
                    class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button></a>

              </td>

              </tr>
              @endforeach


            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection