<?php
$misalimentaciones = new misAlimentaciones();
$especiePeces = $misalimentaciones->obtenerPeces();
?>

<!-- Modal para registrar alimentación -->
<div class="modal fade" id="modalCrearAlimentacion" tabindex="-1" aria-labelledby="modalCrearAlimentacionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="modalCrearAlimentacionLabel">Registrar Alimentación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form id="formAgregaralimentacion">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Especie Peces</label>
              <select name="especiePecesAlimento" id="especiePecesAlimento" class="form-control" required>
                <?php foreach ($especiePeces as $especie) { ?>
                  <option value="<?php echo $especie["id_peces"]; ?>">
                    <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Fecha y Hora</label>
              <input type="datetime-local" class="form-control" id="fecha_horaAlimentacion" name="fecha_horaAlimentacion" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Tipo de Alimento</label>
              <input type="text" class="form-control" id="tipo_alimentoAlimentacion" name="tipo_alimentoAliemntacion" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Cantidad</label>
              <input type="number" step="0.01" class="form-control" id="cantidadAlimentacion" name="cantidadAliemntacion" required>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">Observaciones</label>
              <textarea class="form-control" id="observacionesAliemntacion" name="observacionesAlimentacion" rows="2"></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="agregaralimentacion">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>




<!-- Modal para editar alimentación -->
<div class="modal fade" id="modalEditarAlimentacion" tabindex="-1" aria-labelledby="modalEditarAlimentacionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-warning text-black">
        <h5 class="modal-title" id="modalEditarAlimentacionLabel">Editar Alimentación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="actualizar_alimentacion.php" method="POST">
        <div class="modal-body">




          <div class="mb-3">
            <label class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="editar_fecha_hora" name="fecha_hora" >
          </div>

          <div class="mb-3">
            <label class="form-label">Tipo de Alimento</label>
            <input type="text" class="form-control" id="editar_tipo_alimento" name="tipo_alimento" >
          </div>

          <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number" step="0.01" class="form-control" id="editar_cantidad" name="cantidad" >
          </div>

          <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea class="form-control" id="editar_observaciones" name="observaciones" rows="2"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning text-black">Actualizar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarAlimentacion" tabindex="-1">
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