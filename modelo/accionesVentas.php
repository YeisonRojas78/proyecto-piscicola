<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_ventas.php';

$misventas = new misVentas();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $fecha = $_POST['fecha'];
        $peces_id = $_POST['peces_id'];
        $cantidad_peces = $_POST['cantidad_peces'];
        $peso_venta = $_POST['peso_venta'];
        $precio_venta = $_POST['precio_venta'];
        $nombre_comprador = $_POST['nombre_comprador'];
        $identificacion_comprador = $_POST['identificacion_comprador'];

        $data = [
            'fecha' => $fecha,
            'peces_id' => $peces_id,
            'cantidad_peces' => $cantidad_peces,
            'peso_venta' => $peso_venta,
            'precio_venta' => $precio_venta,
            'nombre_comprador' => $nombre_comprador,
            'identificacion_comprador' => $identificacion_comprador,
        ];

        if ($misventas->agregarVenta($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

elseif ($_POST['accion'] === 'editar') {

    $fecha = $_POST['fecha'];
    $peces_id = $_POST['peces_id'];
    $cantidad_peces = $_POST['cantidad_peces'];
    $peso_venta = $_POST['peso_venta'];
    $precio_venta = $_POST['precio_venta'];
    $nombre_comprador = $_POST['nombre_comprador'];
    $identificacion_comprador = $_POST['identificacion_comprador'];

    $pdo = new Conexion();

    $sql = "UPDATE ventas 
            SET fecha = ?, peces_id = ?, cantidad_peces = ?, peso_venta = ?, precio_venta = ?, nombre_comprador = ?, identificacion_comprador = ?
            WHERE id_venta = ?";
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute([$fecha, $peces_id, $cantidad_peces, $peso_venta, $precio_venta, $nombre_comprador, $identificacion_comprador, $_POST['id_venta']]);

    if (!$resultado) {
        $errorInfo = $stmt->errorInfo();
        echo "Error SQL: " . $errorInfo[2];
    } else {
        echo "1";
        }
    exit;
}
elseif ($_POST['accion'] === 'eliminar') {
    $id = $_POST['id_venta'];

    $pdo = new Conexion();
    $stmt = $pdo->prepare("DELETE FROM ventas WHERE id_venta = ?");
    $resultado = $stmt->execute([$id]);

    echo $resultado ? "1" : "0";
    exit;
}