<?php
$misventas = new misVentas();
$especiePeces = $misventas->obtenerPeces();
?>

<!-- modal crear venta -->
<div class="modal fade" id="modalCrearVenta" tabindex="-1" role="dialog" aria-labelledby="crearVentaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content shadow">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="crearVentaLabel">
          <i class="fas fa-plus"></i> Registrar Venta
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formCrearVenta">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="crear_fecha_venta" class="form-label">Fecha</label>
              <input type="datetime-local" class="form-control" id="crear_fecha_venta" name="crear_fecha_venta" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_pez" class="form-label">Especie</label>
              <select name="especiePecesVentas" id="especiePecesventas" class="form-control" required>
                <?php foreach ($especiePeces as $especie) { ?>
                  <option value="<?php echo $especie["id_peces"]; ?>">
                    <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_cantidad_peces" class="form-label">Cantidad de peces</label>
              <input type="number" class="form-control" id="crear_cantidad_peces" name="cantidad_peces" min="1" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_peso" class="form-label">Peso total (kg)</label>
              <input type="number" step="0.01" class="form-control" id="crear_peso" name="peso_venta" min="0" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_precio" class="form-label">Precio total ($)</label>
              <input type="number" step="0.01" class="form-control" id="crear_precio" name="precio_venta" min="0" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_nombre_comprador" class="form-label">Nombre del comprador</label>
              <input type="text" class="form-control" id="crear_nombre_comprador" name="nombre_compardor" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="crear_identificacion_comprador" class="form-label">Identificación del comprador</label>
              <input type="text" class="form-control" id="crear_identificacion_comprador" name="identificacion_comprador" required>
            </div>
          </div>

          <div class="mt-3 text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="agregarventa">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Editar Venta -->
<div class="modal fade" id="modalEditarVenta" tabindex="-1" aria-labelledby="modalEditarVentaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Encabezado del modal -->
      <div class="modal-header bg-warning text-black">
        <h1 class="modal-title fs-5" id="modalEditarVentaLabel">Editar Venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <form id="formEditarVenta" method="POST" action="actualizar_venta.php">
          <!-- Campo oculto para ID de la venta -->
          <input type="hidden" id="editar_id_venta" name="id_venta">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="editar_fecha" class="form-label">Fecha</label>
              <input type="datetime-local" class="form-control" id="editar_fecha" name="fecha" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_pez" class="form-label">Especie</label>
                <select name="editar_especiePecesVentas" id="editar_especiePecesventas" class="form-control" >
                    <?php foreach ($especiePeces as $especie) { ?>
                        <option value="<?php echo $especie["id_peces"]; ?>">
                            <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_cantidad" class="form-label">Cantidad de peces</label>
              <input type="number" class="form-control" id="editar_cantidad" name="cantidad_peces" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_peso" class="form-label">Peso total (kg)</label>
              <input type="number" step="0.01" class="form-control" id="editar_peso" name="peso_venta" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_precio" class="form-label">Precio total ($)</label>
              <input type="number" step="0.01" class="form-control" id="editar_precio" name="precio_venta" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_nombre_comprador" class="form-label">Nombre del comprador</label>
              <input type="text" class="form-control" id="editar_nombre_comprador" name="nombre_compardor" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="editar_identificacion_comprador" class="form-label">Identificación del comprador</label>
              <input type="text" class="form-control" id="editar_identificacion_comprador" name="identificacion_comprador" >
            </div>
          </div>
        </form>
      </div>

      <!-- Pie del modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" form="formEditarVenta" class="btn btn-warning text-black">Guardar cambios</button>
          <button type="button"
                  class="btn btn-danger"
                  id="btnAbrirModalEliminarVentaAdmin"
                  data-bs-toggle="modal"
                  data-bs-target="#modalEliminarVentaAdmin">Eliminar
          </button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarVentaAdmin" tabindex="-1">
  <div class="modal-dialog modal-dialog-top-end"> <!-- Clase personalizada -->
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
          <input type="hidden" id="id_ventas_a_eliminar">
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