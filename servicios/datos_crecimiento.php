<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misCrecimientos
{
    private $conexion;

    public function __construct()
    {
        include_once('conexion.php');
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }
    function CrecimientoAdmin()
    {
        $consulta = "SELECT c.id_crecimiento, p.especie AS especie, e.nombre AS nombre_estanque, c.fecha, c.peso, c.longitud, c.observaciones 
              FROM crecimiento_peces c JOIN peces p ON c.peces_id = p.id_peces JOIN estanques e ON p.estanques_id = e.id_estanque;";

        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CrecimientoPropietarios($id_usuario)
    {
        $consulta = "SELECT 
                    c.id_crecimiento,
                    p.especie AS especie,
                    e.nombre AS nombre_estanque,
                    c.fecha,
                    c.peso,
                    c.longitud,
                    c.observaciones
                FROM 
                    crecimiento_peces AS c
                JOIN 
                    peces AS p ON c.peces_id = p.id_peces
                JOIN 
                    estanques AS e ON p.estanques_id = e.id_estanque
                JOIN 
                    usuarios AS u ON e.usuarios_id = u.id_usuario
                WHERE 
                    u.id_usuario = :id_usuario
                ORDER BY 
                    c.fecha DESC";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarCrecimiento($data)
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO crecimiento_peces (peces_id, fecha, peso, longitud, observaciones, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(1, $data['peces_id']);
        $stmt->bindParam(2, $data['fecha']);
        $stmt->bindParam(3, $data['peso']);
        $stmt->bindParam(4, $data['longitud']);
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

    function TotalCrecimientoPeces()
    {
        $consulta = "SELECT COUNT(id_crecimiento) AS total_crecimiento FROM crecimiento_peces;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalCrecimientoPecesPropietarios($idUsuario)
    {
        $consulta = "
        SELECT COUNT(c.id_crecimiento) AS total_crecimiento
        FROM crecimiento_peces c
        INNER JOIN peces p ON c.peces_id = p.id_peces
        INNER JOIN estanques e ON p.estanques_id = e.id_estanque
        WHERE e.usuarios_id = :idUsuario;
    ";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchColumn();
    }
}
// Include the database connection