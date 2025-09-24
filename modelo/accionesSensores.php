<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_sensores.php';

$missensores = new misSensores();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $estanques_id = $_POST['id_estanque'];
        $tipo = $_POST['tipo'];
        $modelo = $_POST['modelo'];
        $numero_serie = $_POST['numero_serie'];
        $estado = $_POST['estado'];
        $fecha_instalacion = $_POST['fecha_instalacion'];
        

        $data = [
            'estanques_id' => $estanques_id,
            'tipo' => $tipo,
            'modelo' => $modelo,
            'numero_serie' => $numero_serie,
            'estado' => $estado,
            'fecha_instalacion' => $fecha_instalacion
            
        ];

        if ($missensores->agregarSensor($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}