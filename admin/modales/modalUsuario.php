<?php
$misUsuarios = new misUsuarios();
$usuarios = $misUsuarios->UsuariosPropietarios();
?>

<div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="modalCrearUsuarioLabel" aria-hidden="true">
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
                            <label for="rol_propietario" class="form-label">Rol</label>
                            <select class="form-select" id="rol_propietario" name="rol_propietario" required>
                                <option value="">Seleccione un rol</option>
                                <option value="2">Propietario</option>
                                <option value="1">Administrador</option>
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

<!-- modal edita usuario -->

<div class="modal fade" id="modalEditarUsuarios" tabindex="-1" aria-labelledby="modalEditarUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-warning text-black">
                <h5 class="modal-title" id="modalEditarUsuariosLabel"><strong>Editar Usuario</strong></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formEditarUsuario">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" name="editarNombre" >
                        </div>
                        <div class="col-md-6">
                            <label for="editarCorreo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="editarCorreo" name="editarCorreo" >
                        </div>
                        <div class="col-md-6">
                            <label for="editarUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" >
                        </div>
                        <div class="col-md-6">
                            <label for="editarContrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="editarContrasena" name="editarContrasena">
                        </div>
                        <div class="col-md-6">
                            <label for="editarIdentificacion" class="form-label">Identificación</label>
                            <input type="text" class="form-control" id="editarIdentificacion" name="editarIdentificacion" >
                        </div>
                        <div class="col-md-6">
                            <label for="editarRol" class="form-label">Rol</label>
                            <select class="form-select" id="editarRol" name="editarRol" >
                                <option value="">Seleccione un rol</option>
                                <option value="Admin">Admin</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campo oculto para el ID del usuario -->
                    <input type="hidden" id="editarIdUsuario" name="editarIdUsuario">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formEditarUsuario" class="btn btn-warning text-black">Guardar Cambios</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarUsuario" tabindex="-1">
    <div class="modal-dialog modal-dialog-top-end"> <!-- Clase personalizada -->
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>