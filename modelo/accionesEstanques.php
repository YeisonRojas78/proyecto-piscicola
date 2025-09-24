<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_estanques.php';

$misestanques = new misEstanque();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $usuarios_id = $_POST['nombre_propietario'];
        $nombre_estanque = $_POST['estanque'];
        $ubicacion = $_POST['ubicacion'];
        $capacidad = $_POST['capacidad'];
        $estado = $_POST['estado'];

        $data = [
            'usuarios_id' => $usuarios_id,
            'nombre_estanque' => $nombre_estanque,
            'ubicacion' => $ubicacion,
            'capacidad' => $capacidad,
            'estado' => $estado
        ];

        if ($misestanques->agregarEstanque($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

elseif ($_POST['accion'] === 'editar') {

    $id = $_POST['id_estanque'];
    $usuarios_id = $_POST['usuarios_id'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $capacidad = $_POST['capacidad'];
    $estado = $_POST['estado'];

    $pdo = new Conexion(); // ← CORREGIDO

    $sql = "UPDATE estanques 
            SET usuarios_id = ?, nombre = ?, ubicacion = ?, capacidad = ?, estado = ?
            WHERE id_estanque = ?";
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute([$usuarios_id, $nombre, $ubicacion, $capacidad, $estado, $id]);

    if (!$resultado) {
        $errorInfo = $stmt->errorInfo();
        echo "Error SQL: " . $errorInfo[2];
    } else {
        echo "1";
    }
    exit;
}
//eliminar estanque propietario
elseif ($_POST['accion'] === 'eliminar') {
    $id = $_POST['id_estanque'];

    $pdo = new Conexion();
    $stmt = $pdo->prepare("DELETE FROM estanques WHERE id_estanque = ?");
    $resultado = $stmt->execute([$id]);

    echo $resultado ? "1" : "0";
    exit;
}

elseif ($_POST['accion'] === 'editar_admin') {
    include_once '../servicios/datos_estanques.php';
    $id = $_POST['id_estanque'];
    $usuarios_id = $_POST['usuarios_id'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $capacidad = $_POST['capacidad'];
    $estado = $_POST['estado'];

    $pdo = new Conexion();

    $sql = "UPDATE estanques 
            SET usuarios_id = ?, nombre = ?, ubicacion = ?, capacidad = ?, estado = ?
            WHERE id_estanque = ?";
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute([$usuarios_id, $nombre, $ubicacion, $capacidad, $estado, $id]);

    echo $resultado ? "1" : "0";
    exit;
}

elseif ($_POST['accion'] === 'eliminar_Admin') {
    $id = $_POST['id_estanque'];

    $pdo = new Conexion();
    $stmt = $pdo->prepare("DELETE FROM estanques WHERE id_estanque = ?");
    $resultado = $stmt->execute([$id]);

    echo $resultado ? "1" : "0";
    exit;
}