<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misEstanque
{
    private $conexion;

    public function __construct()
    {
        include_once 'conexion.php';
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }
    function estanquesAdmin()
    {
        $consulta = "SELECT 
    e.id_estanque,
    u.nombre AS nombre_propietario,
    u.id_usuario AS id_propietario,
    e.nombre AS nombre_estanque,
    e.ubicacion,
    e.capacidad,
    e.estado,

    -- Peces en el estanque
    (SELECT IFNULL(SUM(p.cantidad), 0) FROM peces p WHERE p.estanques_id = e.id_estanque) AS cantidad_peces,

    -- Sensores en el estanque
    (SELECT COUNT(*) FROM sensores s WHERE s.estanques_id = e.id_estanque) AS cantidad_sensores,

    -- Alertas asociadas al estanque
    (SELECT COUNT(*) FROM alertas a WHERE a.estanques_id = e.id_estanque) AS cantidad_alertas,

    -- Alimentaciones, a través de los peces del estanque
    (SELECT COUNT(*) FROM alimentaciones al 
        INNER JOIN peces p2 ON al.peces_id = p2.id_peces
        WHERE p2.estanques_id = e.id_estanque
    ) AS cantidad_alimentaciones,

    -- Crecimiento, a través de los peces del estanque
    (SELECT COUNT(*) FROM crecimiento_peces c 
        INNER JOIN peces p3 ON c.peces_id = p3.id_peces
        WHERE p3.estanques_id = e.id_estanque
    ) AS cantidad_crecimientos

FROM estanques e
JOIN usuarios u ON e.usuarios_id = u.id_usuario;";

        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function estanquesPropietarios($idUsuario)
    {
        $consulta = "SELECT 
                    e.id_estanque, 
                    u.nombre, 
                    u.id_usuario AS id_propietario, 
                    e.nombre AS nombre_estanque, 
                    e.ubicacion, 
                    e.capacidad, 
                    e.estado 
                FROM estanques e 
                JOIN usuarios u ON e.usuarios_id = u.id_usuario 
                WHERE u.id_usuario = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function agregarEstanque($data)
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO estanques (usuarios_id, nombre, ubicacion, capacidad, estado, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $data['usuarios_id']);
        $modules->bindParam(2, $data['nombre_estanque']);
        $modules->bindParam(3, $data['ubicacion']);
        $modules->bindParam(4, $data['capacidad']);
        $modules->bindParam(5, $data['estado']);
        $modules->bindParam(6, $createat);
        $modules->bindParam(7, $user_id);
        $modules->bindParam(8, $updateat);
        $modules->bindParam(9, $user_id);
        return $modules->execute();
    }

    function obtenerPropietarios()
    {
        $consulta = "SELECT id_usuario, nombre FROM usuarios WHERE rol = '2'";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEstanquePorId($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM estanques WHERE id_estanque = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function TotalEstanques()
    {
        $consulta = "SELECT COUNT(id_estanque) AS total_estanques FROM estanques;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalEstanquesPropietarios($idUsuario)
    {
        $consulta = "SELECT COUNT(id_estanque) AS total_estanques 
                 FROM estanques 
                 WHERE usuarios_id = :idUsuario;";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchColumn();
    }
}
