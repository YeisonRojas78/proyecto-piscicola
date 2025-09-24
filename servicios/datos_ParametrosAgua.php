<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class misParametros
{
    private $conexion;

    public function __construct()
    {
        include_once('conexion.php');
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }

    function obtenerEstanques()
    {
        $stmt = $this->conexion->prepare("SELECT id_estanque, nombre FROM estanques");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerTodosLosParametros() {
        $consulta = "SELECT 
            e.nombre AS nombre_estanque,
            p.fecha,
            p.temperatura,
            p.ph,
            p.oxigeno
        FROM parametros_agua p
            
        LEFT JOIN sensores s ON 
            p.sensor_temperatura = s.numero_serie
            OR p.sensor_ph = s.numero_serie
            OR p.sensor_oxigeno = s.numero_serie
        LEFT JOIN estanques e ON s.estanques_id = e.id_estanque
        GROUP BY p.id_parametro
        ORDER BY p.fecha DESC
    ";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerParametrosPorEstanque($id_estanque)
    {
        $sql = "SELECT 
                fecha,
                temperatura,
                ph,
                oxigeno
            FROM parametros_agua
            WHERE sensor_temperatura IN (
                SELECT numero_serie FROM sensores WHERE estanques_id = ?
            )
            ORDER BY fecha DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $id_estanque, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function TotalParametrosAgua()
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) AS total FROM parametros_agua");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function PromediosParametros()
    {
        $sql = "SELECT 
                    ROUND(AVG(temperatura), 2) AS temp_prom,
                    ROUND(AVG(ph), 2) AS ph_prom,
                    ROUND(AVG(oxigeno), 2) AS oxi_prom
                FROM parametros_agua";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function PromediosParametrosPropietarios($idUsuario)
    {
        $sql = "SELECT 
                ROUND(AVG(pa.temperatura), 2) AS temp_prom,
                ROUND(AVG(pa.ph), 2) AS ph_prom,
                ROUND(AVG(pa.oxigeno), 2) AS oxi_prom
            FROM parametros_agua pa
            INNER JOIN sensores s ON pa.sensor_temperatura = s.numero_serie 
                                   OR pa.sensor_ph = s.numero_serie 
                                   OR pa.sensor_oxigeno = s.numero_serie
            INNER JOIN estanques e ON s.estanques_id = e.id_estanque
            WHERE e.usuarios_id = :idUsuario";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function TotalParametrosAguaPropietarios($idUsuario)
    {
        $sql = "SELECT COUNT(*) AS total
            FROM parametros_agua pa
            INNER JOIN sensores s ON pa.sensor_temperatura = s.numero_serie 
                                   OR pa.sensor_ph = s.numero_serie 
                                   OR pa.sensor_oxigeno = s.numero_serie
            INNER JOIN estanques e ON s.estanques_id = e.id_estanque
            WHERE e.usuarios_id = :idUsuario";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function obtenerTodosLosParametrosPropietario($idUsuario) {
        $consulta = "
        SELECT 
            e.nombre AS nombre_estanque,
            p.fecha,
            p.temperatura,
            p.ph,
            p.oxigeno
        FROM parametros_agua p
        INNER JOIN sensores s ON 
            p.sensor_temperatura = s.numero_serie
            OR p.sensor_ph = s.numero_serie
            OR p.sensor_oxigeno = s.numero_serie
        INNER JOIN estanques e ON s.estanques_id = e.id_estanque
        WHERE e.usuarios_id = :idUsuario
        GROUP BY p.id_parametro
        ORDER BY p.fecha DESC
    ";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
