<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once '../../servicios/datos_sensores.php';

$misSensor = new misSensores();

if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $sensores = $misSensor->sensoresPropietarios($idUsuario);
} else {
    echo "Usuario no autenticado";
    exit;
}
?>
<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>Listado de Sensores</strong></h1>
            <small>Monitoreo y Gestión de Sensores de Parámetros del Agua</small>
        </div>
        <!-- miga de pan -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Sensores
                </li>
            </ol>
        </nav>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarSensor">
                <i class="bi bi-plus-circle"></i> Agregar Sensor
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaSensoresData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Sensor</th>
                        <th>Nombre del Estanque</th>
                        <th>Tipo de Sensor</th>
                        <th>Modelo</th>
                        <th>Estado</th>
                        <th>Serie</th>
                        <th>Fecha Instalación</th>
                        <th>Editar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $sensores es un array y contiene los datos esperados
                    if (isset($sensores) && is_array($sensores)) {
                        foreach ($sensores as $sensor) {
                            $datosAp = $sensor['id_sensor'] . "||" .
                                $sensor['nombre_estanque'] . "||" .
                                $sensor['tipo'] . "||" .
                                $sensor['modelo'] . "||" .
                                $sensor['estado'] . "||" . // Asegúrate de que el orden coincide con el uso si parseas esta cadena
                                $sensor['numero_serie'] . "||" .
                                $sensor['fecha_instalacion'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $sensor["id_sensor"]; ?></td>
                                <td><?php echo $sensor["nombre_estanque"]; ?></td>
                                <td><?php echo $sensor["tipo"]; ?></td>
                                <td><?php echo $sensor["modelo"]; ?></td>
                                <td><?php echo $sensor["estado"]; ?></td>
                                <td><?php echo $sensor["numero_serie"]; ?></td>
                                <td><?php echo $sensor["fecha_instalacion"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm editar-btn" data-bs-toggle="modal" data-bs-target="#modalEditarSensor" data-id="<?php echo $sensor['id_sensor']; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Contar el número de columnas para el colspan
                        $num_columnas_sensores = 9; // ID, Nombre Estanque, Tipo, Modelo, Estado, Serie, Fecha Instalación, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_sensores . '" class="text-center">No hay sensores registrados.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tablaSensoresData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [[0, 'asc']], // Ordena por la primera columna (ID Sensor) de forma ascendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });
</script>
