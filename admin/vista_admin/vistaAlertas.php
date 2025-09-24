<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center" role="alert">
            <h1 class="mb-0"><strong>Listado de Alertas</strong></h1>
            <small>Monitoreo de Parámetros del Agua</small>
        </div>
    <!-- miga de pan -->
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
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Alerta</th>
                        <th>Nombre Estanque</th>
                        <th>ID Parámetro</th>
                        <th>Fecha</th>
                        <th>Tipo Alerta</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asumiendo que la variable que contiene los datos de las alertas se llama $alertas
                    if (isset($alertas) && is_array($alertas)) {
                        foreach ($alertas as $alerta) {
                            $datosAp = $alerta['id_alerta'] . "||" .
                                $alerta['nombre_estanque'] . "||" .
                                $alerta['id_parametro'] . "||" .
                                $alerta['fecha'] . "||" .
                                $alerta['tipo_alerta'] . "||" .
                                $alerta['descripcion'] . "||" .
                                $alerta['estado'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $alerta["id_alerta"]; ?></td>
                                <td><?php echo $alerta["nombre_estanque"]; ?></td>
                                <td><?php echo $alerta["id_parametro"]; ?></td>
                                <td><?php echo $alerta["fecha"]; ?></td>
                                <td><?php echo $alerta["tipo_alerta"]; ?></td>
                                <td><?php echo $alerta["descripcion"]; ?></td>
                                <td><?php echo $alerta["estado"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm editar-btn" data-bs-toggle="modal" data-bs-target="#modalEditarAlerta" data-id="<?php echo $alerta['id_alerta']; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Contar el número de columnas para el colspan
                        $num_columnas_alertas = 10; // ID, Nombre Estanque, ID Parámetro, Fecha, Tipo, Descripción, Estado, Editar, Ver, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_alertas . '" class="text-center">No hay alertas registradas.</td></tr>';
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