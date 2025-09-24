<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'misParametros.php';
$misParametros = new misParametros();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['accion'] === 'estanques') {
    echo json_encode($misParametros->obtenerEstanques());
    exit;
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['accion'] === 'listar') {
    $id = $_POST['id_estanque'] ?? null;
    if ($id) {
        echo json_encode($misParametros->obtenerParametrosPorEstanque($id));
    } else {
        echo json_encode([]);
    }
    exit;
}
