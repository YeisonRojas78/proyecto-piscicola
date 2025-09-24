<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../servicios/datos_ventas.php';

$miventa = new misVentas();

if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $ventas = $miventa->ventasPropietarios($idUsuario);
} else {
    echo "Usuario no autenticado";
    exit;
}

?>

<div class="main-content">

    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center">
            <h1 class="mb-0"><strong>Historial de Ventas</strong></h1>
            <small>Registro Detallado de Ventas de Peces</small>
        </div>
        <!-- miga de pan -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Ventas
                </li>
            </ol>
        </nav>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearVenta">
                <i class="bi bi-plus"></i> Agregar Venta
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaVentasData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Id Venta</th>
                        <th>Especie</th>
                        <th>Nombre Estanque</th>
                        <th>Fecha Venta</th>
                        <th>Cantidad de Peces</th>
                        <th>Peso (kg)</th>
                        <th>Precio Total ($)</th>
                        <th>Nombre del Comprador</th>
                        <th>Identificación del Comprador</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $ventas es un array y contiene los datos esperados
                    if (isset($ventas) && is_array($ventas)) {
                        foreach ($ventas as $venta) {
                            // Aunque $datosAp no se usa directamente en la vista, lo mantengo si lo necesitas para JS
                            $datosAp = $venta['id_venta'] . "||" .
                                $venta['especie'] . "||" .
                                $venta['nombre_estanque'] . "||" .
                                $venta['fecha'] . "||" .
                                $venta['cantidad_peces'] . "||" .
                                $venta['peso_venta'] . "||" .
                                $venta['precio_venta'] . "||" .
                                $venta['nombre_comprador'] . "||" .
                                $venta['identificacion_comprador'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $venta["id_venta"]; ?></td>
                                <td><?php echo $venta["especie"]; ?></td>
                                <td><?php echo $venta["nombre_estanque"]; ?></td>
                                <td><?php echo $venta["fecha"]; ?></td>
                                <td><?php echo $venta["cantidad_peces"]; ?></td>
                                <td><?php echo $venta["peso_venta"]; ?> Kg</td>
                                <td>$<?php echo number_format($venta["precio_venta"], 2, ',', '.'); ?></td>
                                <td><?php echo $venta["nombre_comprador"]; ?></td>
                                <td><?php echo $venta["identificacion_comprador"]; ?></td>
                                <td>
                                    <button
                                        class="btn btn-warning btn-sm btnEditarVenta"
                                        data-especie="<?php echo htmlspecialchars($venta["especie"]); ?>"
                                        data-fecha="<?php echo $venta["fecha"]; ?>"
                                        data-cantidad-peces="<?php echo $venta["cantidad_peces"]; ?>"
                                        data-peso-venta="<?php echo $venta["peso_venta"]; ?>"
                                        data-precio-venta="<?php echo $venta["precio_venta"]; ?>"
                                        data-nombre-comprador="<?php echo htmlspecialchars($venta["nombre_comprador"]); ?>"
                                        data-identificacion-comprador="<?php echo htmlspecialchars($venta["identificacion_comprador"]); ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditarVenta">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>

                            </tr>
                    <?php
                        }
                    } else {
                        // Mensaje si no hay ventas para mostrar
                        echo '<tr><td colspan="10" class="text-center">No hay ventas registradas.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaVentasData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [
                [0, 'asc']
            ], // Ordena por la primera columna (ID Venta) de forma ascendente por defecto
            pageLength: 10 // Muestra 10 registros por página
        });
    });
</script>