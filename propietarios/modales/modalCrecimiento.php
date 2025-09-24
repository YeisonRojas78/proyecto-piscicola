<?php
$miscrecimientos = new misCrecimientos();
$idUsuario = $_SESSION['id_usuario'];
$especiePeces = $miscrecimientos->obtenerPecesPropietarios($idUsuario);
?>
<!-- Modal para editar crecimiento -->
<div class="modal fade" id="modalEditarCrecimientoPropietarios" tabindex="-1" role="dialog" aria-labelledby="modalEditarCrecimientoPropietariosLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-warning text-black">
        <h5 class="modal-title" id="modalEditarCrecimientoPropietariosLabel">
          <i class="fas fa-user-plus"></i> Editar Crecimiento
        </h5>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

 <form id="formEditarCrecimiento">
  
      <div class="modal-body">
        <!-- ID oculto -->
       
          <input type="hidden" id="editar_id_crecimiento" name="id_crecimiento">

          <div class="mb-3">
            <label for="editar_especie" class="form-label">Especie Peces</label>
            <select name="editar_especie" id="editar_especie" class="form-control" >
              <?php foreach ($especiePeces as $especie) { ?>
                <option value="<?php echo $especie["id_peces"]; ?>">
                  <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                </option>
              <?php } ?>
            </select>
          </div>


          <div class="mb-3">
            <label for="editar_fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="editar_fecha" name="fecha" >
          </div>

          <div class="mb-3">
            <label for="editar_peso" class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" class="form-control" id="editar_peso" name="peso" >
          </div>

          <div class="mb-3">
            <label for="editar_longitud" class="form-label">Longitud (cm)</label>
            <input type="number" step="0.01" class="form-control" id="editar_longitud" name="longitud" >
          </div>

          <div class="mb-3">
            <label for="editar_observaciones" class="form-label">Observaciones</label>
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
<!-- Modal para registrar crecimiento -->
<div class="modal fade" id="modalCrearCrecimientoPropietarios" tabindex="-1" aria-labelledby="modalCrearCrecimientoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalCrearCrecimientoLabel">Registrar Crecimiento</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form id="formAgregarcrecimiento">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="especiePecescrecimiento">Especie Peces</label>
                            <select name="especiePecescrecimiento" id="especiePecescrecimiento" class="form-control" required>
                                <?php foreach ($especiePeces as $especie) { ?>
                                    <option value="<?php echo $especie["id_peces"]; ?>">
                                        <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="fechaCrecimiento" class="form-label">Fecha</label>
                            <input type="datetime-local" class="form-control" id="fechaCrecimiento" name="fechaCrecimiento" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pesoCrecimiento" class="form-label">Peso (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="pesoCrecimiento" name="pesoCrecimiento" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="longitudCrecimiento" class="form-label">Longitud (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="longitudCrecimiento" name="longitudCrecimiento" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="observacionesCrecimiento" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observacionesCrecimiento" name="observacionesCrecimiento" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="agregarcrecimiento">Guardar</button>
                    </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal para editar crecimiento -->
<div class="modal fade" id="modalModificarCrecimientoPropietarios" tabindex="-1" aria-labelledby="modalEditarCrecimientoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalEditarCrecimientoLabel">Modificar Crecimiento</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form id="formEditarCrecimiento">
                <div class="modal-body">
                    <div class="row">

                        <label for="editar_idCrecimiento"></label>
                        <input type="text" class="form-control" id="editar_idCrecimiento" name="idCrecimiento">

                        <div class="col-md-6 mb-3">
                            <label for="editar_especiePecescrecimiento">Especie Peces</label>
                            <select name="editar_especiePecescrecimiento" id="editar_especiePecescrecimiento" class="form-control" required>
                                <?php foreach ($especiePeces as $especie) { ?>
                                    <option value="<?php echo $especie["id_peces"]; ?>">
                                        <?php echo $especie["especie"] . " (" . $especie["nombre_estanque"] . ")"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="editar_fechaCrecimiento" class="form-label">Fecha</label>
                            <input type="datetime-local" class="form-control" id="editar_fechaCrecimiento" name="editar_fechaCrecimiento" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="editar_pesoCrecimiento" class="form-label">Peso (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="editar_pesoCrecimiento" name="editar_pesoCrecimiento" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="editar_longitudCrecimiento" class="form-label">Longitud (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="editar_longitudCrecimiento" name="editar_longitudCrecimiento" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="editar_observacionesCrecimiento" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="editar_observacionesCrecimiento" name="editar_observacionesCrecimiento" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="agregarcrecimiento">Guardar</button>
                    </div>
            </form>

        </div>
    </div>
</div>