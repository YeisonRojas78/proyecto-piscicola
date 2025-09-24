<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../servicios/datosAlimentacion.php';
$misAlimentaciones = new misAlimentaciones();
$alimentaciones = $misAlimentaciones->AlimentacionesAdmin();
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>ALIMENTACIÓN</strong></h1>
            <small>Registro y Control de Alimentación de Peces</small>
        </div>
    <!-- miga de pan -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Alimentacion
                </li>
            </ol>
        </nav>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearAlimentacion">
                <i class="bi bi-plus-circle"></i> Agregar Alimentación
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaAlimentacionData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Alimentación</th>
                        <th>Tipo Peces</th>
                        <th>Nombre Estanque</th>
                        <th>Fecha y Hora</th>
                        <th>Tipo de Alimento</th>
                        <th>Cantidad de Alimento</th>
                        <th>Observaciones</th>
                        <th>Editar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $alimentaciones es un array y contiene los datos esperados
                    if (isset($alimentaciones) && is_array($alimentaciones)) {
                        foreach ($alimentaciones as $alimentacion) {
                            $datosAlimentacion = $alimentacion['id_alimento'] . "||" .
                                $alimentacion['especie'] . "||" .
                                $alimentacion['nombre_estanque'] . "||" .
                                $alimentacion['fecha_hora'] . "||" .
                                $alimentacion['tipo_alimento'] . "||" .
                                $alimentacion['cantidad_alimento'] . "||" .
                                $alimentacion['observaciones'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $alimentacion["id_alimento"]; ?></td>
                                <td><?php echo $alimentacion["especie"]; ?></td>
                                <td><?php echo $alimentacion["nombre_estanque"]; ?></td>
                                <td><?php echo $alimentacion["fecha_hora"]; ?></td>
                                <td><?php echo $alimentacion["tipo_alimento"]; ?></td>
                                <td><?php echo $alimentacion["cantidad_alimento"]; ?> kg</td>
                                <td><?php echo $alimentacion["observaciones"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm editar-btn" data-bs-toggle="modal" data-bs-target="#modalEditarAlimentacion" data-id="<?php echo $alimentacion['id_alimento']; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Contar el número de columnas para el colspan
                        $num_columnas_alimentacion = 9; // ID, Tipo Peces, Nombre Estanque, Fecha/Hora, Tipo Alimento, Cantidad, Observaciones, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_alimentacion . '" class="text-center">No hay registros de alimentación.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tablaAlimentacionData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [[0, 'desc']], // Ordena por la primera columna (ID Alimentación) de forma descendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });
</script>

