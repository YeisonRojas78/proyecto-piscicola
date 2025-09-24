<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misSensores
{
    private $conexion;

    public function __construct()
    {
        include_once 'conexion.php';
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }

    function sensoresAdmin()
    {
        $consulta = "SELECT s.id_sensor, e.nombre AS 'nombre_estanque', s.tipo , s.modelo, s.estado , s.numero_serie, s.fecha_instalacion 
              FROM sensores s JOIN estanques e ON s.estanques_id = e.id_estanque;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function sensoresPropietarios($idUsuario)
    {
        $consulta = "SELECT 
                    s.id_sensor, 
                    e.nombre AS nombre_estanque, 
                    s.tipo, 
                    s.modelo, 
                    s.estado, 
                    s.numero_serie, 
                    s.fecha_instalacion 
                FROM sensores s 
                JOIN estanques e ON s.estanques_id = e.id_estanque 
                JOIN usuarios u ON e.usuarios_id = u.id_usuario
                WHERE u.id_usuario = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function agregarSensor($data)
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO sensores (estanques_id, tipo, modelo, numero_serie, estado, fecha_instalacion, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $data['estanques_id']);
        $modules->bindParam(2, $data['tipo']);
        $modules->bindParam(3, $data['modelo']);
        $modules->bindParam(4, $data['numero_serie']);
        $modules->bindParam(5, $data['estado']);
        $modules->bindParam(6, $data['fecha_instalacion']);
        $modules->bindParam(7, $createat);
        $modules->bindParam(8, $user_id);
        $modules->bindParam(9, $updateat);
        $modules->bindParam(10, $user_id);
        return $modules->execute();
    }
    function obtenerEstanques()
    {
        $consulta = "SELECT id_estanque, nombre FROM estanques";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function obtenerEstanquesPropietarios($idUsuario)
    {
        $consulta = "SELECT id_estanque, nombre 
                 FROM estanques 
                 WHERE usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function obtenerSensoresPorEstanque($idEstanque)
    {
        $consulta = "SELECT * FROM sensores WHERE estanques_id = :idEstanque";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idEstanque', $idEstanque, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function TotalSensores()
    {
        $consulta = "SELECT COUNT(id_sensor) AS total_sensores FROM sensores;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalSensoresPropietarios($idUsuario)
    {
        $consulta = "SELECT COUNT(s.id_sensor) AS total_sensores
                 FROM sensores s
                 INNER JOIN estanques e ON s.estanques_id = e.id_estanque
                 WHERE e.usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchColumn();
    }
}
