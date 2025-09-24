<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_crecimiento.php';

$miscrecimiento = new misCrecimientos();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $peces_id = $_POST['peces_id'];
        $fecha = $_POST['fecha'];
        $peso = $_POST['peso'];
        $longitud = $_POST['longitud'];
        $observaciones = $_POST['observaciones'];

        $data = [
            'peces_id' => $peces_id,
            'fecha' => $fecha,
            'peso' => $peso,
            'longitud' => $longitud,
            'observaciones' => $observaciones,
        ];

        if ($miscrecimiento->agregarCrecimiento($data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accion = $_GET['accion'];

        if ($accion == 'modificar') {
            $id_crecimiento = $_POST['id_crecimiento'];
            $peces_id = $_POST['peces_id'];
            $fecha = $_POST['fecha'];
            $peso = $_POST['peso'];
            $longitud = $_POST['longitud'];
            $observaciones = $_POST['observaciones'];

            $consulta = "UPDATE crecimiento_peces SET peces_id = ?, fecha = ?, peso = ?, longitud = ?, observaciones = ? WHERE id_crecimiento = ?";

            $stmt = $this->conexion->prepare($consulta);
            $stmt->bindParam(1, $peces_id);
            $stmt->bindParam(2, $fecha);
            $stmt->bindParam(3, $peso);
            $stmt->bindParam(4, $longitud);
            $stmt->bindParam(5, $observaciones);
            $stmt->bindParam(6, $id_crecimiento);

            if ($stmt->execute()) {
                echo 1; // Modificación exitosa
            } else {
                echo 0; // Error al modificar
            }
        }

}