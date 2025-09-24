<?php
$misparametros = new misParametros();
$estanques = $misparametros->obtenerEstanques();
?>

<div class="modal fade" id="modalCrearparametros" tabindex="-1" aria-labelledby="modalCrearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalCrearUsuarioLabel"><strong>Agregar Usuario</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarUsuarios">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_propietario" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre_propietario" name="nombre_propietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="identificacion_propietario" class="form-label">Identificación</label>
                            <input type="text" class="form-control" id="identificacion_propietario" name="identificacion_propietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="correo_propietario" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo_propietario" name="correo_propietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usuario_propietario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario_propietario" name="usuario_propietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contrasena_propietario" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena_propietario" name="contrasena_propietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rol_propietario" class="form-label">Rol</label>
                            <select class="form-select" id="rol_propietario" name="rol_propietario" required>
                                <option value="">Seleccione un rol</option>
                                <option value="propietario">Propietario</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="agregarusuario">Guardar</button>
                    </div>
                </form>
            </div> 

        </div>
    </div>
</div>

