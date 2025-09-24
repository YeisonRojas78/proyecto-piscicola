<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datosAlimentacion.php';

$misalimentaciones = new misAlimentaciones();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $peces_id = $_POST['peces_id'];
        $fecha_hora = $_POST['fecha_hora'];
        $tipo_alimento = $_POST['tipo_alimento'];
        $cantidad_alimento = $_POST['cantidad_alimento'];
        $observaciones = $_POST['observaciones'];

        $data = [
            'peces_id' => $peces_id,
            'fecha_hora' => $fecha_hora,
            'tipo_alimento' => $tipo_alimento,
            'cantidad_alimento' => $cantidad_alimento,
            'observaciones' => $observaciones,
        ];

        if ($misalimentaciones->agregarAlimentaciones($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}