<?php
$misEstanque = new misEstanque();
$nombrePropietarios = $misEstanque->obtenerPropietarios();

?>

<!-- modal ediar estanque -->


<div class="modal fade" id="ModalEditarEstanquePropietario" tabindex="-1" role="dialog" aria-labelledby="EditarEstanqueLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-black">
                <h5 class="modal-title" id="EditarEstanqueLabel">
                    <i class="fas fa-pen-to-square me-2"></i>Editar Estanque
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body bg-light">
                <form id="formEditarEstanque">
                    <!-- ID oculto del estanque -->
                    <input type="hidden" id="editar_id_estanque" name="id_estanque">

                    <div class="row">

                        <!-- Nombre del estanque -->
                        <div class="col-md-6 mb-3">
                            <label for="crear_nombre_estanqueu" class="form-label">Nombre del Estanque</label>
                            <input type="text" class="form-control" id="crear_nombre_estanqueu" name="nombre_estanque" >
                        </div>

                        <!-- Ubicación -->
                        <div class="col-md-6 mb-3">
                            <label for="crear_ubicacionu" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="crear_ubicacionu" name="ubicacion" >
                        </div>

                        <!-- Capacidad -->
                        <div class="col-md-6 mb-3">
                            <label for="crear_capacidadu" class="form-label">Capacidad (Lt)</label>
                            <input type="number" class="form-control" id="crear_capacidadu" name="capacidad" >
                        </div>

                        <!-- Estado -->
                        <div class="col-md-6 mb-3">
                            <label for="estado_estanqueu" class="form-label">Estado Estanque</label>
                            <select class="form-select" id="estado_estanqueu" name="estado_estanque" >
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-warning text-black">Guardar Cambios
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar
                        </button>
                        <button type="button"
                                class="btn btn-danger"
                                id="btnAbrirModalEliminar"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminarEstanque">Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal agregar Estanque -->
<div class="modal fade" id="modalAgregarEstanquePropietario" tabindex="-1" aria-labelledby="modalAgregarEstanqueLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalAgregarEstanqueLabel"><strong>Agregar Estanque</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formAgregarEstanque">
                    <div class="row">
                        <!-- Campo oculto para enviar el ID del usuario logueado -->
                        <input type="hidden" name="usuario_idPropietario" id="usuario_idPropietario"
                               value="<?php echo $_SESSION['id_usuario']; ?>">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_estanquePropietario" class="form-label">Nombre del Estanque</label>
                            <input type="text" class="form-control" id="nombre_estanquePropietario" name="nombre_estanquePropietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ubicacionPropietario" class="form-label">Ubicacion</label>
                            <input type="text" class="form-control" id="ubicacionPropietario" name="ubicacionPropietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="capacidadPropietario" class="form-label">Capacidad (Lt)</label>
                            <input type="text" class="form-control" id="capacidadPropietario" name="capacidadPropietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado_estanquePropietario" class="form-label">Estado Estanque</label>
                            <select class="form-select" id="estado_estanquePropietario" name="estado_estanquePropietario">
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>

                    </div>

                    <!-- Campo oculto para el ID del usuario -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" form="formAgregarEstanque" class="btn btn-primary" id="agregarestanquepropietario">Guardar Estanque</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarEstanque" tabindex="-1">
    <div class="modal-dialog modal-dialog-top-end"> <!-- Clase personalizada -->
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <input type="hidden" id="id_estanque_a_eliminarPropietario">
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