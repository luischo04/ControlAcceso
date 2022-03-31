<div id="modaldireccion" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="direccion_form">
                <div class="modal-body">
                    <input type="hidden" id="id_direccion" name="id_direccion">

                    <div class="form-group">
                        <label class="form-label" for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa calle y numero" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="inf_casa">Informacion de la casa</label>
                        <textarea class="form-control" id="inf_casa" name="inf_casa" placeholder="Describe detalles de la casa" rows="4" cols="50" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>