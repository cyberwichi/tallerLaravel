@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario {{$user->name}}</div>
                <div class="card-body">
                    <form action="{{route('admin.users.update', ['user'=>$user->id])}} " method="POST">
                    {{ csrf_field() }}
              
                    {{method_field('PUT')}}
                    @foreach ($roles as $role )
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            {{$user->hasAnyRole($role->name)?'checked':''}}>
                        <label>{{$role->name}}</label>
                        </div>                        
                    @endforeach
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    
                    
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection