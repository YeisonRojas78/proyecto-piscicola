<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");

require_once 'val-admin.php';
class misVentas
{
    private $conexion;

    public function __construct()
    {
        include_once 'conexion.php';
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }

    function ventasAdmin()
    {
        $consulta = "SELECT v.id_venta, p.especie AS 'especie', e.nombre AS 'nombre_estanque', v.fecha , v.cantidad_peces ,v.peso_venta ,v.precio_venta ,v.nombre_comprador,
                     v.identificacion_comprador FROM ventas v JOIN  peces p ON v.peces_id = p.id_peces JOIN estanques e ON p.estanques_id = e.id_estanque";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ventasPropietarios($id_usuario)
    {
        $consulta = "SELECT 
                    v.id_venta, 
                    p.especie AS especie, 
                    e.nombre AS nombre_estanque, 
                    v.fecha, 
                    v.cantidad_peces,
                    v.peso_venta,
                    v.precio_venta,
                    v.nombre_comprador,
                    v.identificacion_comprador
                FROM ventas v
                JOIN peces p ON v.peces_id = p.id_peces
                JOIN estanques e ON p.estanques_id = e.id_estanque
                WHERE e.usuarios_id = :id_usuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
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


    public function obtenerVentasPorEstanque($id_estanque) {$stmt = $this->conexion->prepare("SELECT v.id_venta, v.fecha, v.cantidad_peces, v.peso_venta, v.precio_venta, v.nombre_comprador
    FROM ventas v
    JOIN peces p ON v.peces_id = p.id_peces
    WHERE p.estanques_id = ?");

        $stmt->execute([$id_estanque]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function agregarVenta($data)
    {
        
        $user_id = $_SESSION['identificacion'];
        $createat = date("Y-m-d H:i:s");
        $updateat = date("Y-m-d H:i:s");
        $consulta = "INSERT INTO ventas (fecha, peces_id, cantidad_peces, peso_venta, precio_venta, nombre_comprador, identificacion_comprador, createat, usercreate, updateat, userupdate)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(1, $data['fecha']);
        $stmt->bindParam(2, $data['peces_id']);
        $stmt->bindParam(3, $data['cantidad_peces']);
        $stmt->bindParam(4, $data['peso_venta']);
        $stmt->bindParam(5, $data['precio_venta']);
        $stmt->bindParam(6, $data['nombre_comprador']);
        $stmt->bindParam(7, $data['identificacion_comprador']);
        $stmt->bindParam(8, $createat);
        $stmt->bindParam(9, $user_id);
        $stmt->bindParam(10, $updateat);
        $stmt->bindParam(11, $user_id);
        return $stmt->execute();
    }
    function TotalVentas()
    {
        $consulta = "SELECT COUNT(id_venta) AS total_ventas FROM ventas;";
        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchColumn();
    }
    function TotalVentasPropietarios($idUsuario)
    {
        $consulta = "SELECT COUNT(v.id_venta) AS total_ventas
                 FROM ventas v
                 INNER JOIN peces p ON v.peces_id = p.id_peces
                 INNER JOIN estanques e ON p.estanques_id = e.id_estanque
                 WHERE e.usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchColumn();
    }
}
// Include the database connection