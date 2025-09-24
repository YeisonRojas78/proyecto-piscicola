<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_peces.php';

$mispeces = new misPeces();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $estanques_id = $_POST['id_estanque'];
        $especie = $_POST['especie'];
        $cantidad = $_POST['cantidad'];
        $peso_promedio = $_POST['peso_promedio'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $estado = $_POST['estado'];

        $data = [
            'estanques_id' => $estanques_id,
            'especie' => $especie,
            'cantidad' => $cantidad,
            'peso_promedio' => $peso_promedio,
            'fecha_ingreso' => $fecha_ingreso,
            'estado' => $estado
        ];

        if ($mispeces->agregarPeces($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
elseif (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == 'modificar') {

        $id_peces = $_POST['id_peces'];
        $estanques_id = $_POST['estanques_id']; // Corrección aquí
        $especie = $_POST['especie'];
        $cantidad = $_POST['cantidad'];
        $peso_promedio = $_POST['peso_promedio'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $estado = $_POST['estado'];

        $data = [
            'id_peces' => $id_peces,
            'id_estanque' => $estanques_id, // ✅ corregido
            'especie' => $especie,
            'cantidad' => $cantidad,
            'peso_promedio' => $peso_promedio,
            'fecha_ingreso' => $fecha_ingreso,
            'estado' => $estado
        ];

        if ($mispeces->modificarPeces($data)) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($accion == 'eliminar') {
        $id_peces = $_POST['id_peces'];
        if ($mispeces->eliminarPeces($id_peces)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
elseif ($accion == 'modificarPropietario') {

        $id_peces = $_POST['id_peces'];
        $estanques_id = $_POST['estanques_id']; // Corrección aquí
        $especie = $_POST['especie'];
        $cantidad = $_POST['cantidad'];
        $peso_promedio = $_POST['peso_promedio'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $estado = $_POST['estado'];

        $data = [
            'id_peces' => $id_peces,
            'id_estanque' => $estanques_id, // ✅ corregido
            'especie' => $especie,
            'cantidad' => $cantidad,
            'peso_promedio' => $peso_promedio,
            'fecha_ingreso' => $fecha_ingreso,
            'estado' => $estado
        ];

        if ($mispeces->modificarPecesPropietario($data)) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($accion == 'eliminarPropietario') {
        $id_peces = $_POST['id_peces'];
        if ($mispeces->eliminarPecesPropietario($id_peces)) {
            echo 1;
        } else {
            echo 0;
        }
}
