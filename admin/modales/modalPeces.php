<?php
$misPeces = new misPeces();
$nombreEstanque = $misPeces->obtenerEstanques();
?>
<!-- Modal para registrar pez -->
<div class="modal fade" id="modalCrearPezPropietario" tabindex="-1" aria-labelledby="modalCrearPezLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalCrearPezLabel">Registrar Pez</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
            </div>


            <div class="modal-body">
                <form id="formAgregarPeces">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre Estanque</label>
                            <select name="estanque_idPeces" id="estanque_idPeces" class="form-control" required>
                                <?php foreach ($nombreEstanque as $estanque) { ?>
                                    <option value="<?php echo $estanque["id_estanque"]; ?>">
                                        <?php echo $estanque["nombre"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="especiePez" class="form-label">Especie</label>
                            <input type="text" class="form-control" id="especiePez" name="especiePez" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="cantidadPez" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidadPez" name="cantidadPez" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="peso_promedioPez" class="form-label">Peso Promedio (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="peso_promedioPez"
                                   name="peso_promedioPez" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="fecha_ingresoPez" class="form-label">Fecha de Ingreso</label>
                            <input type="datetime-local" class="form-control" id="fecha_ingresoPez"
                                   name="fecha_ingresoPez" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="estadoPez" class="form-label">Estado</label>
                            <select class="form-select" id="estadoPez" name="estadoPez" required>
                                <option value="Crecimiento">Crecimiento</option>
                                <option value="Cosecha">Cosecha</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="agregarpeces">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar pez -->

<div class="modal fade" id="modalEditarPezAdmin" tabindex="-1" aria-labelledby="modalEditarPezAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-warning text-black">
        <h5 class="modal-title" id="modalEditarPezAdminLabel">Editar Pez (Admin)</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form id="formEditarPecesAdmin">
        <div class="modal-body">

          <!-- ID oculto -->
          <input type="hidden" id="editar_idPez_admin" name="id_peces_admin">
          <input type="hidden" id="id_estanques_admin" name="id_estanques_admin">

            <div class="mb-3">
                <label>Nombre Estanque</label>
                <select name="estanque_idPeces" id="estanque_idPeces" class="form-control" >
                    <?php foreach ($nombreEstanque as $estanque) { ?>
                        <option value="<?php echo $estanque["id_estanque"]; ?>">
                            <?php echo $estanque["nombre"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
          <div class="mb-3">
            <label for="editar_especie_admin" class="form-label">Especie</label>
            <input type="text" class="form-control" id="editar_especie_admin" name="especie_admin" >
          </div>

          <div class="mb-3">
            <label for="editar_cantidad_admin" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="editar_cantidad_admin" name="cantidad_admin" >
          </div>

          <div class="mb-3">
            <label for="editar_peso_promedio_admin" class="form-label">Peso Promedio (kg)</label>
            <input type="number" step="0.01" class="form-control" id="editar_peso_promedio_admin" name="peso_promedio_admin" >
          </div>
          <div class="mb-3">
            <label for="editar_fecha_ingreso_admin" class="form-label">Fecha de Ingreso</label>
            <input type="datetime-local" class="form-control" id="editar_fecha_ingreso_admin" name="editar_fecha_ingreso_admin" >
          </div>
          <div class="mb-3">
            <label for="editar_estado_admin" class="form-label">Estado</label>
            <select class="form-select" id="editar_estado_admin" name="estado_admin" >
              <option value="Crecimiento">Crecimiento</option>
              <option value="Cosecha">Cosecha</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-warning" onclick="EditarPeces()">Actualizar</button>

        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="modalEliminarPecesAdmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-top-end"> <!-- Clase personalizada -->
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <input type="hidden" id="id_peces_a_eliminar">
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
