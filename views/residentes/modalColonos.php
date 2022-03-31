<div id="modalcolono" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="colono_form">
                <div class="modal-body">
                    <input type="hidden" id="id_colono" name="id_colono">

                    <div class="form-group">
                        <label class="form-label" for="nom_colono">Nombre(s):</label>
                        <input type="text" class="form-control" id="nom_colono" name="nom_colono" placeholder="Escribe tu nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="ape_colono">Apellido(s): </label>
                        <input type="text" class="form-control" id="ape_colono" name="ape_colono" placeholder="Ingresa tus apellidos" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="telefono">Telefono: </label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Escribe tu numero" required>
                    </div>

                    <div class="form-group">
							<label class="form-label semibold" for="id_direccion">Direccion:</label>
							<select id="id_direccion" name="id_direccion" class="form-control"></select>
					</div>

                    <div class="form-group">
                        <label class="form-label" for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="1">Masculino</option>
                            <option value="0">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="activo_colono">Estado:</label>
                        <select class="form-control" id="activo_colono" name="activo_colono">
                            <option value="1">Activo</option>
                            <option value="0">Desactivado</option>
                        </select>
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