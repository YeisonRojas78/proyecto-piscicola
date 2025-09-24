<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../../servicios/datos_ParametrosAgua.php';
include_once '../../servicios/datos_estanques.php';

$misParametros = new misParametros();
$parametros = $misParametros->obtenerTodosLosParametros();
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center">
            <h1 class="mb-0"><strong>Litado De Parametros Del Agua</strong></h1>
            <small>Monitoreo de Parámetros del Agua</small>
        </div>
        <!-- miga de pan -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Parametros Del Agua
                </li>
            </ol>
        </nav>
        <div class="table-responsive">
            <table id="tablaPropietariosData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Nombre Estanque</th>
                        <th>Fecha</th>
                        <th>Temperatura (°C)</th>
                        <th>pH</th>
                        <th>Oxígeno (mg/L)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $usuarios es un array y contiene los datos esperados
                    if (isset($parametros) && is_array($parametros)) {
                        foreach ($parametros as $p): ?>
                            <tr class="text-center">
                                <td><?= htmlspecialchars($p['nombre_estanque']) ?></td>
                                <td><?= $p['fecha'] ?></td>
                                <td><?= $p['temperatura'] ?></td>
                                <td><?= $p['ph'] ?></td>
                                <td><?= $p['oxigeno'] ?></td>
                            </tr>
                        <?php endforeach;
                    } else {
                        // Mensaje si no hay usuarios para mostrar
                        // Contar el número de columnas para el colspan
                        $num_columnas_propietarios = 9; // ID, Nombre, Correo, Identificación, Usuario, Contraseña, Rol, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_propietarios . '" class="text-center">No hay usuarios propietarios registrados.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaPropietariosData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [
                [0, 'desc']
            ], // Ordena por la primera columna (ID Propietario) de forma ascendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });
</script>