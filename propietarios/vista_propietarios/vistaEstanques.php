<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once '../../servicios/datos_estanques.php';
$misEstanques = new misEstanque();

if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $estanques = $misEstanques->estanquesPropietarios($idUsuario);
} else {
    echo "Usuario no autenticado";
    exit;
}
?>


<div class="main-content">
  <div class="container-fluid mt-4">
    <div class="alert alert-info text-center">
      <h1 class="mb-0"><strong>Listado de Estanques</strong></h1>
      <small>Monitoreo de Parámetros del Agua</small>
    </div>
    <!-- miga de pan -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Estanques
                </li>
            </ol>
        </nav>
    <div class="mb-3">
      <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarEstanquePropietario">
        <i class="bi bi-person-plus"></i> Agregar Estanque
      </button>
    </div>

    <div class="table-responsive">
      <table id="tablaEstanquesData" class="table table-striped table-bordered">
        <thead class="table-primary text-center">
          <tr>
            <th>ID Estanque</th>
            <th>Nombre Propietario</th>
            <th>Nombre Estanque</th>
            <th>Ubicación</th>
            <th>Capacidad</th>
            <th>Estado</th>
            <th>Editar</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($estanques as $estanque): ?>
            <tr class="text-center">
              <td><a href="../propietarios/DetallesEstanque.php?id_estanque=<?= $estanque["id_estanque"] ?>" class="text-decoration-underline text-dark">
                      <?= $estanque["id_estanque"] ?>
                  </a></td>
              <td><?= $estanque["nombre"] ?></td>
              <td><?= $estanque["nombre_estanque"] ?></td>
              <td><?= $estanque["ubicacion"] ?></td>
              <td><?= $estanque["capacidad"] ?> Lt</td>
              <td><?= $estanque["estado"] ?></td>
              <td>
                  <button class="btn btn-warning btn-sm btnEditarEstanque"
                          data-id="<?= $estanque["id_estanque"] ?>"
                          data-nombre="<?= htmlspecialchars($estanque["nombre_estanque"]) ?>"
                          data-ubicacion="<?= htmlspecialchars($estanque["ubicacion"]) ?>"
                          data-capacidad="<?= $estanque["capacidad"] ?>"
                          data-estado="<?= $estanque["estado"] ?>"
                          data-usuario="<?= $estanque["id_propietario"] ?>"
                          data-bs-toggle="modal"
                          data-bs-target="#ModalEditarEstanquePropietario">
                      <i class="bi bi-pencil"></i>
                  </button>
              </td>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- jQuery + DataTables JS -->


<!-- DataTables configuración -->
<script>
$(document).ready(function () {
  $('#tablaEstanquesData').DataTable({

    order: [[0, 'asc']]
  });
});
</script>


