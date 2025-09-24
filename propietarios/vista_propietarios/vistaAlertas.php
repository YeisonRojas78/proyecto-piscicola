<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once '../../servicios/datos_alertas.php';

$misalertas = new misAlertas();
if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $alertas = $misalertas->alertasPropietarios($idUsuario);
} else {
    echo "Usuario no autenticado";
    exit;
}
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>Listado de Alertas</strong></h1>
            <small>Monitoreo de Parámetros del Agua</small>
        </div>

        <!-- Miga de pan -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Alertas
                </li>
            </ol>
        </nav>

        <div class="table-responsive">
            <table id="tablaAlertasData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID Alerta</th>
                        <th>Nombre Estanque</th>
                        <th>ID Parámetro</th>
                        <th>Fecha</th>
                        <th>Tipo Alerta</th>
                        <th>Tipo Sensor</th>
                        <th>Valor Sensor</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($alertas) && is_array($alertas)) {
                        foreach ($alertas as $alerta) {
                            $datosAp = $alerta['id_alerta'] . "||" .
                                $alerta['nombre_estanque'] . "||" .
                                $alerta['parametros_id'] . "||" .
                                $alerta['fecha'] . "||" .
                                $alerta['tipo_alerta'] . "||" .
                                $alerta['descripcion'] . "||" .
                                $alerta['estado'];
                    ?>
                            <tr class="text-center">
                                <td><?= $alerta["id_alerta"] ?></td>
                                <td><?= $alerta["nombre_estanque"] ?></td>
                                <td><?= $alerta["parametros_id"] ?></td>
                                <td><?= $alerta["fecha"] ?></td>
                                <td><?= $alerta["tipo_alerta"] ?></td>
                                <td><?= $alerta["tipo_sensor"] ?></td>
                                <td><?= $alerta["valor_parametro"] ?></td>
                                <td><?= $alerta["descripcion"] ?></td>
                                <td><?= $alerta["estado"] ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="10" class="text-center">No hay alertas registradas.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tablaAlertasData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            order: [[0, 'asc']],
            pageLength: 10
        });
    });
</script>
