<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misUsuarios
{
    private $conexion;

    public function __construct()
    {
        include_once('conexion.php');
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }

    function usuariosAdmin()
    {
        $consulta = "SELECT u.id_usuario, r.nombre AS 'rol', u.nombre, u.correo, u.identificacion, u.usuario, u.contrasena FROM usuarios u JOIN rol r ON u.rol = r.cod_rol";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function UsuariosPropietarios()
    {
        $consulta = "SELECT u.id_usuario, r.nombre AS 'rol', u.nombre, u.correo, u.identificacion, u.usuario, u.contrasena FROM usuarios u JOIN rol r ON u.rol = r.cod_rol";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function agregarUsuarios($data)
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO usuarios (nombre, correo, identificacion, usuario, contrasena, estado, rol, createat, usercreate, updateat, userupdate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $data['nombre']);
        $modules->bindParam(2, $data['correo']);
        $modules->bindParam(3, $data['identificacion']);
        $modules->bindParam(4, $data['usuario']);
        $modules->bindParam(5, $data['contrasena']);
        $modules->bindParam(6, $data['estado']);
        $modules->bindParam(7, $data['rol']);
        $modules->bindParam(8, $createat);
        $modules->bindParam(9, $user_id);
        $modules->bindParam(10, $updateat);
        $modules->bindParam(11, $user_id);
        return $modules->execute();
    }
    function TotalUsuarios()
    {
        $consulta = "SELECT COUNT(id_usuario) AS total_usuarios FROM usuarios;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function ViewUsuarios($identificacion)
    {
        $consulta = "SELECT * FROM usuarios WHERE identificacion = :identificacion";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(":identificacion", $identificacion);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
}
