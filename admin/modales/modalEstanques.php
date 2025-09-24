<?php
$misEstanque = new misEstanque();
$nombrePropietarios = $misEstanque->obtenerPropietarios();

?>
<!-- Modal Editar Estanque (Admin) -->
<div class="modal fade" id="modalEditarEstanqueAdmin" tabindex="-1" role="dialog" aria-labelledby="modalEditarEstanqueAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-black">
                <h5 class="modal-title" id="modalEditarEstanqueAdminLabel">
                    <i class="fas fa-user-edit"></i> Editar Estanque (Admin)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body bg-light">
                <form id="formEditarEstanqueAdmin">
                    <!-- ID oculto -->
                    <input type="hidden" id="id_estanque_admin" name="id_estanque">

                    <div class="row">
                        <!-- Propietario -->
                        <div class="col-md-6 mb-3">
                            <label for="usuario_idAdmin" class="form-label">Nombre del Propietario</label>
                            <select name="usuarios_id" id="usuario_idAdmin" class="form-select" >
                                <?php foreach ($nombrePropietarios as $propietario): ?>
                                    <option value="<?= $propietario["id_usuario"]; ?>">
                                        <?= htmlspecialchars($propietario["nombre"]); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Nombre del estanque -->
                        <div class="col-md-6 mb-3">
                            <label for="nombre_estanque_admin" class="form-label">Nombre del Estanque</label>
                            <input type="text" class="form-control" id="nombre_estanque_admin" name="nombre" >
                        </div>

                        <!-- Ubicación -->
                        <div class="col-md-6 mb-3">
                            <label for="ubicacion_estanque_admin" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion_estanque_admin" name="ubicacion" >
                        </div>

                        <!-- Capacidad -->
                        <div class="col-md-6 mb-3">
                            <label for="capacidad_estanque_admin" class="form-label">Capacidad (Lt)</label>
                            <input type="number" class="form-control" id="capacidad_estanque_admin" name="capacidad" >
                        </div>

                        <!-- Estado -->
                        <div class="col-md-6 mb-3">
                            <label for="estado_estanque_admin" class="form-label">Estado Estanque</label>
                            <select class="form-select" id="estado_estanque_admin" name="estado" >
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-warning text-black">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button"
                                class="btn btn-danger"
                                id="btnAbrirModalEliminarAdmin"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminarEstanqueAdmin">Eliminar
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
                        <div class="col-md-6 mb-3">
                            <label>Nombre del Propietario</label>
                            <select name="usuario_idAdmin" id="usuario_idAdmin" class="form-control" required>
                                <?php foreach ($nombrePropietarios as $propietario) { ?>
                                    <option value="<?php echo $propietario["id_usuario"]; ?>">
                                        <?php echo $propietario["nombre"]; ?>
                                    </option>
                                <?php } ?>
                            </select>


                        </div>
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
<div class="modal fade" id="modalEliminarEstanqueAdmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-top-end"> <!-- Clase personalizada -->
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <input type="hidden" id="id_estanque_a_eliminar">
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