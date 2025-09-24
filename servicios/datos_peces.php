<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");
require_once 'val-admin.php';
class misPeces
{
    private $conexion;

    public function __construct()
    {
        include_once('conexion.php');
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }
    function PecesAdmin()
    {
        $consulta = "SELECT p.id_peces, e.nombre AS nombre_estanque, e.id_estanque as estanques_id, p.especie, p.cantidad, p.peso_promedio, p.fecha_ingreso, p.estado FROM peces p JOIN estanques e ON p.estanques_id = e.id_estanque";

        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    public function PecesPropietarios($id_usuario)
    {
        $consulta = "SELECT 
                    p.id_peces,
                    p.estanques_id,
                    e.nombre AS nombre_estanque,
                    p.especie,
                    p.cantidad,
                    p.peso_promedio,
                    p.fecha_ingreso,
                    p.estado
                FROM peces p
                JOIN estanques e ON p.estanques_id = e.id_estanque
                WHERE e.usuarios_id = :id_usuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $modules->execute();

        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function agregarPeces($data): bool
    {
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO peces (estanques_id, especie, cantidad, peso_promedio, fecha_ingreso, estado, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $data['estanques_id']);
        $modules->bindParam(2, $data['especie']);
        $modules->bindParam(3, $data['cantidad']);
        $modules->bindParam(4, $data['peso_promedio']);
        $modules->bindParam(5, $data['fecha_ingreso']);
        $modules->bindParam(6, $data['estado']);
        $modules->bindParam(7, $createat);
        $modules->bindParam(8, $user_id);
        $modules->bindParam(9, $updateat);
        $modules->bindParam(10, $user_id);
        return $modules->execute();
    }
    function obtenerEstanquesPropietarios($idUsuario): array
    {
        $consulta = "SELECT id_estanque, nombre 
                 FROM estanques 
                 WHERE usuarios_id = :idUsuario";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerPecesPorEstanque($id_estanque): array
    {
        $stmt = $this->conexion->prepare("SELECT p.id_peces, p.especie, p.cantidad, p.peso_promedio, p.fecha_ingreso, p.estado 
                                          FROM peces p 
                                          WHERE p.estanques_id = ?");
        $stmt->execute([$id_estanque]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function obtenerEstanques(): array
    {
        $consulta = "SELECT id_estanque, nombre FROM estanques";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function TotalPeces(): int
    {
        $consulta = "SELECT SUM(cantidad) AS total_peces FROM peces;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalPecesPropietarios($idUsuario): int
    {
        $consulta = "SELECT SUM(p.cantidad) AS total_peces
                 FROM peces p
                 INNER JOIN estanques e ON p.estanques_id = e.id_estanque
                 WHERE e.usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
       $resultado = $modules->fetch(PDO::FETCH_ASSOC );
        return (int) $resultado['total_peces'];
    }

    function modificarPeces($data): bool
    {
        $consulta = "UPDATE peces 
SET 
  estanques_id = ?, 
  especie = ?, 
  cantidad = ?, 
  peso_promedio = ?, 
  fecha_ingreso = ?, 
  estado = ? 
WHERE id_peces = ?";

        $modules = $this->conexion->prepare($consulta);

        // Asociar los valores a los placeholders
        $modules->bindParam(1, $data['id_estanque']);
        $modules->bindParam(2, $data['especie']);
        $modules->bindParam(3, $data['cantidad']);
        $modules->bindParam(4, $data['peso_promedio']);
        $modules->bindParam(5, $data['fecha_ingreso']);
        $modules->bindParam(6, $data['estado']);
        $modules->bindParam(7, $data['id_peces']);

        // Ejecutar y devolver resultado (true/false)
        return $modules->execute();
    }
    function eliminarPeces($id_peces): bool
    {
        $consulta = "DELETE FROM peces WHERE id_peces = ?";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $id_peces, PDO::PARAM_INT);
        return $modules->execute();
    }

    function modificarPecesPropietario($data): bool
{
    $consulta = "UPDATE peces 
SET 
  estanques_id = ?, 
  especie = ?, 
  cantidad = ?, 
  peso_promedio = ?, 
  fecha_ingreso = ?, 
  estado = ? 
WHERE id_peces = ?";

    $modules = $this->conexion->prepare($consulta);

    // Asociar los valores a los placeholders
    $modules->bindParam(1, $data['id_estanque']);
    $modules->bindParam(2, $data['especie']);
    $modules->bindParam(3, $data['cantidad']);
    $modules->bindParam(4, $data['peso_promedio']);
    $modules->bindParam(5, $data['fecha_ingreso']);
    $modules->bindParam(6, $data['estado']);
    $modules->bindParam(7, $data['id_peces']);

    // Ejecutar y devolver resultado (true/false)
    return $modules->execute();
}
    function eliminarPecesPropietario($id_peces): bool
    {
        $consulta = "DELETE FROM peces WHERE id_peces = ?";
        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(1, $id_peces, PDO::PARAM_INT);
        return $modules->execute();
    }

}

// Include the database connection