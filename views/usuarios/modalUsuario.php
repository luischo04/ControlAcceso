<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="id_usuario" name="id_usuario">

                    <div class="form-group">
                        <label class="form-label" for="nom_usuario">Nombre</label>
                        <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="ape_usuario">Apellido</label>
                        <input type="text" class="form-control" id="ape_usuario" name="ape_usuario" placeholder="Ingrese Apellido" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nacimiento_usuario">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="nacimiento_usuario" name="nacimiento_usuario" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sexo">Sexo</label>
                        <select class="select2" id="sexo" name="sexo">
                            <option value="1">Masculino</option>
                            <option value="0">Femenino</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="usuario">Correo Electronico</label>
                        <input type="email" class="form-control" id="usuario" name="usuario" placeholder="test@test.com" required>
                    </div>

                    <div class="form-group" id="pass">
                        <label class="form-label" for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_rol">Rol</label>
                        <select class="select2" id="id_rol" name="id_rol">
                            <option value="1">Administrador</option>
                            <option value="2">Seguridad</option>
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