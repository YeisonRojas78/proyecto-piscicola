<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../../servicios/datos_estanques.php';
include_once '../../servicios/datos_ventas.php';
include_once '../../servicios/datos_peces.php';
include_once '../../servicios/datos_sensores.php';
include_once '../../servicios/datos_alertas.php';
include_once '../../servicios/datos_ParametrosAgua.php';

$id_estanque = isset($_GET['id_estanque']) ? intval($_GET['id_estanque']) : null;

if (!$id_estanque) {
    echo "<div class='alert alert-danger text-center'>Estanque no especificado.</div>";
    exit;
}


$misEstanques = new misEstanque();
$misventas = new misVentas();
$misPeces = new misPeces();
$misSensores = new misSensores();
$misAlertas = new misAlertas();
$misParametrosAgua = new misParametros();


// Obtener datos del estanque
$infoEstanque = $misEstanques->obtenerEstanquePorId($id_estanque);
// Ventas
$ventas = $misventas->obtenerVentasPorEstanque($id_estanque);
// Peces
$peces = $misPeces->obtenerPecesPorEstanque($id_estanque);
// Sensores
$sensores = $misSensores->obtenerSensoresPorEstanque($id_estanque);

// Alertas
$alertas = $misAlertas->obtenerAlertasPorEstanque($id_estanque);
// Parámetros de agua
$parametros = $misParametrosAgua->obtenerParametrosPorEstanque($id_estanque);
?>

<div class="container mt-4">
    <h2 class="text-center mb-3">Estanque #<?= htmlspecialchars($id_estanque) ?></h2>
    <!-- miga de pan -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
            <li class="breadcrumb-item">
                <a href="./index.php" class="text-decoration-none">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="./estanques.php" class="text-decoration-none">Estanques</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Detalles del Estanque
            </li>
        </ol>
    </nav>
    <!-- Info general -->
    <div class="card mb-4">
        <div class="card-header bg-danger text-white">Información del Estanque</div>
        <div class="card-body">
            <p><strong>Nombre:</strong> <?= $infoEstanque['nombre'] ?></p>
            <p><strong>Ubicación:</strong> <?= $infoEstanque['ubicacion'] ?></p>
            <p><strong>Capacidad:</strong> <?= $infoEstanque['capacidad'] ?> Lt</p>
            <p><strong>Estado:</strong> <?= $infoEstanque['estado'] ?></p>
        </div>
    </div>

    <!-- Ventas -->
    <div class="card mb-4">
        <div class="card-header bg-danger text-white">Ventas</div>
        <div class="card-body">
            <?php if ($ventas): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Cantidad de Peces</th>
                        <th>Peso (Kg)</th>
                        <th>Precio ($)</th>
                        <th>Comprador</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ventas as $v): ?>
                        <tr>
                            <td><?= $v['fecha'] ?></td>
                            <td><?= $v['cantidad_peces'] ?></td>
                            <td><?= $v['peso_venta'] ?></td>
                            <td><?= $v['precio_venta'] ?></td>
                            <td><?= $v['nombre_comprador'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted text-center">No hay ventas registradas para este estanque.</p>
            <?php endif; ?>
        </div>
    </div>


    <!-- Peces -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Peces</div>
        <div class="card-body">
            <?php if ($peces): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                    <tr>
                        <th>Especie</th>
                        <th>Cantidad</th>
                        <th>Peso Promedio (Kg)</th>
                        <th>Fecha de Ingreso</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($peces as $p): ?>
                        <tr>
                            <td><?= $p['especie'] ?></td>
                            <td><?= $p['cantidad'] ?></td>
                            <td><?= $p['peso_promedio'] ?></td>
                            <td><?= $p['fecha_ingreso'] ?></td>
                            <td><?= $p['estado'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted text-center">No hay peces registrados en este estanque.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Sensores -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Sensores Asociados</div>
        <div class="card-body">
            <?php if ($sensores): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                    <tr>
                        <th>Tipo</th>
                        <th>Modelo</th>
                        <th>Número de Serie</th>
                        <th>Estado</th>
                        <th>Fecha de Instalación</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sensores as $s): ?>
                        <tr>
                            <td><?= $s['tipo'] ?></td>
                            <td><?= $s['modelo'] ?></td>
                            <td><?= $s['numero_serie'] ?></td>
                            <td><?= $s['estado'] ?></td>
                            <td><?= $s['fecha_instalacion'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted text-center">No hay sensores asignados a este estanque.</p>
            <?php endif; ?>
        </div>
    </div>


    <!-- Alertas -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Alertas</div>
        <div class="card-body">
            <?php if ($alertas && count($alertas) > 0): ?>
                <?php foreach ($alertas as $alerta): ?>
                    <div class="border rounded p-2 mb-2">
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($alerta['descripcion']) ?></p>
                        <p><strong>Fecha de Alerta:</strong> <?= htmlspecialchars($alerta['fecha']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center">Sin alertas registradas.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Parámetros -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Parámetros del Estanque</div>
        <div class="card-body">
            <?php if ($parametros): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Temperatura (°C)</th>
                        <th>pH</th>
                        <th>Oxígeno (mg/L)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($parametros as $p): ?>
                        <tr>
                            <td><?= $p['fecha'] ?></td>
                            <td><?= $p['temperatura'] ?></td>
                            <td><?= $p['ph'] ?></td>
                            <td><?= $p['oxigeno'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted text-center">No hay parámetros registrados para este estanque.</p>
            <?php endif; ?>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('#tablaDetallesEstanquesData').DataTable({
        });
    });
</script>