<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$user->id}}">

            <div class="modal-dialog">
                    <div class="modal-content">
            
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                            <h3 class="modal-title">Eliminar Usuario</h3>
            
                        </div> 
                        <div class="modal-body">
                            <p>¿REALMENTE DESEA ELIMINAR ESTE USUARIO DE LA BASE DE DATOS?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a href="{{ route('admin.user.delete', $user->id)}}">Si Borrar</a>
            
                        </div>
                    </div>
                </div>




    </form>
    {!!Form::open(['url' => 'admin/users/destroy/'.$user->id, 'method' => 'DELETE', 'class' => 'pull-right'])!!}
 
    
    {{Form::Close()}}

</div>