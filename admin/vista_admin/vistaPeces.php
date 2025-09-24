<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../servicios/datos_peces.php';
$misPeces = new misPeces();
$peces = $misPeces->PecesAdmin();
?>
<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>Peces</strong></h1>
            <small>Inventario y Gestión de Peces por Estanque</small>
        </div>
        <!-- miga de pan -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Peces
                </li>
            </ol>
        </nav>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearPezPropietario">
                <i class="bi bi-plus-circle"></i> Agregar Pez
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaPecesData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Peces</th>
                        <th>Nombre Estanque</th>
                        <th>Especie</th>
                        <th>Cantidad</th>
                        <th>Peso Promedio (kg)</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                        <th>Editar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $peces es un array y contiene los datos esperados
                    if (isset($peces) && is_array($peces)) {
                        foreach ($peces as $pez) {
                            $datosAp = $pez['id_peces'] . "||" .
                                $pez['estanques_id'] . "||" .
                                $pez['especie'] . "||" .
                                $pez['cantidad'] . "||" .
                                $pez['peso_promedio'] . "||" .
                                $pez['fecha_ingreso'] . "||" .
                                $pez['estado'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $pez["id_peces"]; ?></td>
                                <td><?php echo $pez["nombre_estanque"]; ?></td>
                                <td><?php echo $pez["especie"]; ?></td>3
                                <td><?php echo $pez["cantidad"]; ?></td>
                                <td><?php echo $pez["peso_promedio"]; ?> Kg</td>
                                <td><?php echo $pez["fecha_ingreso"]; ?></td>
                                <td><?php echo $pez["estado"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarPezAdmin"
                                            data-id="<?php echo $pez['id_peces']; ?>" onclick= "llenarEditarPeces('<?php echo$datosAp;?>')"> <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Contar el número de columnas para el colspan
                        $num_columnas_peces = 9; // ID, Nombre Estanque, Especie, Cantidad, Peso Promedio, Fecha Ingreso, Estado, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_peces . '" class="text-center">No hay peces registrados en este estanque.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tablaPecesData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [[0, 'asc']], // Ordena por la primera columna (ID Peces) de forma ascendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });
</script>
