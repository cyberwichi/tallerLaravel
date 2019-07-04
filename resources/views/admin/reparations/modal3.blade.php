<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-borrado-lista2">


    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Eliminar TODO EXCEPTO las Reparaciones Listadas</h3>

            </div>
            <div class="modal-body">
                <p>¿REALMENTE DESEA ELIMINAR TODAS LAS REPARACIONES DE LA BASE DE DATOS EXCEPTO LAS LISTADAS ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
               
                <a href="{{ route('admin.reparation.deleteListadas2', $searchText)}}">Si Borrar</a>
            </div>
        </div>
    </div>


</div>