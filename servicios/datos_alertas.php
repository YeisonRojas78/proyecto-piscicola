<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class misAlertas
{
    private $conexion;

    public function __construct()
    {
        include_once 'conexion.php';
        $this->conexion = new Conexion(); // Asegúrate de que devuelve un PDO
    }
    function AlertaAdmin()
    {
        $consulta = "SELECT 
    v.id_venta AS 'id_venta',
    p.especie AS 'especie',
    e.nombre AS 'nombre_estanque',
    v.fecha AS 'fecha',
    v.cantidad_peces AS 'cantidad_peces',
    v.peso_venta AS 'peso_peces',
    v.precio_venta AS 'precio_venta',
    v.nombre_compardor AS 'nombre_comprador',
    v.identificacion_comprador AS 'identificacion_comprador'
FROM 
    ventas v
JOIN 
    peces p ON v.peces_id = p.id_peces
JOIN 
    estanques e ON p.estanques_id = e.id_estanque;
";

        $modules = $this->conexion->prepare($consulta);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }

    function alertasPropietarios($idUsuario)
    {
        $consulta = "SELECT 
    a.id_alerta, 
    e.nombre AS nombre_estanque, 
    a.parametros_id, 
    a.fecha, 
    a.tipo_alerta, 
    a.descripcion, 
    a.estado,

    -- Detectar tipo de sensor y valor asociado
    CASE 
        WHEN pa.sensor_temperatura IS NOT NULL AND a.parametros_id = pa.id_parametro THEN 'Temperatura'
        WHEN pa.sensor_ph IS NOT NULL AND a.parametros_id = pa.id_parametro THEN 'pH'
        WHEN pa.sensor_oxigeno IS NOT NULL AND a.parametros_id = pa.id_parametro THEN 'Oxígeno'
        ELSE 'Desconocido'
    END AS tipo_sensor,

    CASE 
        WHEN pa.sensor_temperatura IS NOT NULL AND a.parametros_id = pa.id_parametro THEN pa.temperatura
        WHEN pa.sensor_ph IS NOT NULL AND a.parametros_id = pa.id_parametro THEN pa.ph
        WHEN pa.sensor_oxigeno IS NOT NULL AND a.parametros_id = pa.id_parametro THEN pa.oxigeno
        ELSE NULL
    END AS valor_parametro

FROM alertas a
JOIN parametros_agua pa ON a.parametros_id = pa.id_parametro
JOIN estanques e ON a.estanques_id = e.id_estanque
WHERE e.usuarios_id = :idUsuario";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idUsuario', $idUsuario);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
    function obtenerAlertasPorEstanque($idEstanque)
    {
        $consulta = "SELECT 
            a.id_alerta, 
            e.nombre AS nombre_estanque, 
            a.parametros_id, 
            a.fecha, 
            a.tipo_alerta, 
            a.descripcion, 
            a.estado,
            pa.temperatura,
            pa.ph,
            pa.oxigeno
        FROM alertas a
        JOIN parametros_agua pa ON a.parametros_id = pa.id_parametro
        JOIN estanques e ON a.estanques_id = e.id_estanque
        WHERE e.id_estanque = :idEstanque";

        $modules = $this->conexion->prepare($consulta);
        $modules->bindParam(':idEstanque', $idEstanque, PDO::PARAM_INT);
        $modules->execute();
        return $modules->fetchAll(PDO::FETCH_ASSOC);
    }
}
