<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../servicios/datos_crecimiento.php';

$misCrecimiento = new misCrecimientos();
$crecimientos= $misCrecimiento->CrecimientoAdmin();
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>Listado de Crecimiento de Peces</strong></h1>
            <small>Seguimiento del Desarrollo de los Peces</small>
        </div>
        <!-- miga de pan -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Crecimiento Peces
                </li>
            </ol>
        </nav>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearCrecimientoPropietarios">
                <i class="bi bi-plus-circle"></i> Agregar Crecimiento
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaCrecimientoData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Crecimiento</th>
                        <th>Tipo Peces</th>
                        <th>Nombre Estanque</th>
                        <th>Fecha</th>
                        <th>Peso (kg)</th>
                        <th>Longitud (cm)</th>
                        <th>Observaciones</th>
                        <th>Editar</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $crecimientos es un array y contiene los datos esperados
                    if (isset($crecimientos) && is_array($crecimientos)) {
                        foreach ($crecimientos as $crecimiento) {
                            // Se añade nombre_estanque al $datosAp
                            $datosAp = $crecimiento['id_crecimiento'] . "||" .
                                $crecimiento['especie'] . "||" .
                                $crecimiento['nombre_estanque'] . "||" . // Asegúrate de que esta columna existe en tu array
                                $crecimiento['fecha'] . "||" .
                                $crecimiento['peso'] . "||" .
                                $crecimiento['longitud'] . "||" .
                                $crecimiento['observaciones'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $crecimiento["id_crecimiento"]; ?></td>
                                <td><?php echo $crecimiento["especie"]; ?></td>
                                <td><?php echo $crecimiento["nombre_estanque"]; ?></td>
                                <td><?php echo $crecimiento["fecha"]; ?></td>
                                <td><?php echo $crecimiento["peso"]; ?> Kg</td>
                                <td><?php echo $crecimiento["longitud"]; ?> Cm</td>
                                <td><?php echo $crecimiento["observaciones"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#modalEditarCrecimientoPropietarios"
                                        data-id="<?php echo $crecimiento['id_crecimiento']; ?>"
                                        onclick="llenarEditarCrecimiento('<?php echo htmlspecialchars($datosAp, ENT_QUOTES, 'UTF-8'); ?>')">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Contar el número de columnas para el colspan
                        $num_columnas_crecimiento = 9; // ID, Tipo Peces, Nombre Estanque, Fecha, Peso, Longitud, Observaciones, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_crecimiento . '" class="text-center">No hay registros de crecimiento.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tablaCrecimientoData').DataTable({

            order: [[3, 'desc']], // Ordena por la cuarta columna (Fecha) de forma descendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });


</script>