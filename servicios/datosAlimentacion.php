<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misAlimentaciones
{
    private $conexion;

    public function __construct()
    {
        include_once('conexion.php');
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }
    function AlimentacionesAdmin()
    {
        $consulta = "SELECT a.id_alimento, p.especie AS especie, e.nombre AS nombre_estanque, a.fecha_hora, a.tipo_alimento, a.cantidad_alimento, a.observaciones 
              FROM alimentaciones a JOIN peces p ON a.peces_id = p.id_peces JOIN estanques e ON p.estanques_id = e.id_estanque;";

        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AlimentacionesPropietarios($id_usuario)
    {
        $consulta = "SELECT 
                    a.id_alimento, 
                    p.especie AS especie, 
                    e.nombre AS nombre_estanque, 
                    a.fecha_hora, 
                    a.tipo_alimento, 
                    a.cantidad_alimento, 
                    a.observaciones 
                FROM alimentaciones a 
                JOIN peces p ON a.peces_id = p.id_peces 
                JOIN estanques e ON p.estanques_id = e.id_estanque
                WHERE e.usuarios_id = :id_usuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarAlimentaciones($data)
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO alimentaciones (peces_id, fecha_hora, tipo_alimento, cantidad_alimento, observaciones, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(1, $data['peces_id']);
        $stmt->bindParam(2, $data['fecha_hora']);
        $stmt->bindParam(3, $data['tipo_alimento']);
        $stmt->bindParam(4, $data['cantidad_alimento']);
        $stmt->bindParam(5, $data['observaciones']);
        $stmt->bindParam(6, $createat);
        $stmt->bindParam(7, $user_id);
        $stmt->bindParam(8, $updateat);
        $stmt->bindParam(9, $user_id);

        return $stmt->execute();
    }
    function obtenerPeces()
    {
        $consulta = "SELECT p.id_peces, p.especie, p.estanques_id, e.nombre AS nombre_estanque 
                 FROM peces p 
                 JOIN estanques e ON p.estanques_id = e.id_estanque";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function obtenerPecesPropietarios($idUsuario)
    {
        $consulta = "SELECT p.id_peces, p.especie, p.estanques_id, e.nombre AS nombre_estanque 
                 FROM peces p 
                 JOIN estanques e ON p.estanques_id = e.id_estanque
                 WHERE e.usuarios_id = :idUsuario";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function TotalAlimentacionPeces()
    {
        $consulta = "SELECT COUNT(id_alimento) AS total_alimentaciones FROM alimentaciones;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalAlimentacionPecesPropietarios($idUsuario)
    {
        $consulta = "SELECT COUNT(a.id_alimento) AS total_alimentaciones
                 FROM alimentaciones a
                 INNER JOIN peces p ON a.peces_id = p.id_peces
                 INNER JOIN estanques e ON p.estanques_id = e.id_estanque
                 WHERE e.usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchColumn();
    }
}
// Include the database connection