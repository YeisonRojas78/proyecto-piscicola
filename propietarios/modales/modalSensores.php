<?php
$misSensores = new misSensores();
$idUsuario = $_SESSION['id_usuario'];
$nombreEstanque = $misSensores->obtenerEstanquesPropietarios($idUsuario);
?>

<!-- Modal agregar Usuario -->
<div class="modal fade" id="modalAgregarSensor" tabindex="-1" aria-labelledby="modalAgregarSensorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalAgregarSensorLabel"><strong>Agregar Sensor</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formAgregarSensor">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre Estanque</label>
                            <select name="estanque_idSensores" id="estanque_idSensores" class="form-control" required>
                                <?php foreach ($nombreEstanque as $estanque) { ?>
                                    <option value="<?php echo $estanque["id_estanque"]; ?>">
                                        <?php echo $estanque["nombre"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tipo_sensorPropietario" class="form-label">Tipo Sensor</label>
                            <select class="form-select" id="tipo_sensorPropietario" name="tipo_sensorPropietario" require>
                                <option value="TEMPERATURA">Temperatura</option>
                                <option value="PH">Ph</option>
                                <option value="OXIGENO">Oxigeno</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="modeloSensorPropietario" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloSensorPropietario" name="modeloSensorPropietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="serieSensorPropietario" class="form-label">Serie</label>
                            <input type="text" class="form-control" id="serieSensorPropietario" name="serieSensorPropietario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estadoSensorPropietario" class="form-label">Estado Sensor</label>
                            <select class="form-select" id="estadoSensorPropietario" name="estadoSensorPropietario">
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha y Hora Instalacion</label>
                            <input type="datetime-local" class="form-control" id="fecha_horaSensor" name="fecha_horaSensor" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="agregarSensor">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal editar Sensor -->

<div class="modal fade" id="modalEditarSensor" tabindex="-1" role="dialog" aria-labelledby="EditarSensorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-black">
                <h5 class="modal-title" id="EditarSensorLabel">
                    <i class="fas fa-user-plus"></i> Editar Sensor
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body bg-light">
                <form id="formEditarSensor">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editar_nombre_estanque" class="form-label">Nombre del Estanque</label>
                            <input type="text" class="form-control" id="editar_nombre_estanque" name="nombre_estanque" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editar_tipo_sensor" class="form-label">Tipo Sensor</label>
                            <input type="text" class="form-control" id="editar_tipo_sensor" name="tipo_sensor" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editar_modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="editar_modelo" name="modelo" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editar_serie" class="form-label">Serie</label>
                            <input type="text" class="form-control" id="editar_serie" name="serie" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado_Sensor" class="form-label">Estado Sensor</label>
                            <select class="form-select" id="estado_Sensor" name="estado_Sensor">
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha y Hora Instalacion</label>
                            <input type="datetime-local" class="form-control" id="editar_fecha_hora" name="fecha_hora" >
                        </div>

                    </div>
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-warning text-black">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarSensor" tabindex="-1">
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