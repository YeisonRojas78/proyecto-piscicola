<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../servicios/datos_usuarios.php';

$misusuarios = new misUsuarios();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == "registrar") {
        // Recoger correctamente los datos del POST
        $nombre = $_POST['nombre'];
        $identificacion = $_POST['identificacion'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['usuario'];
        $estado = 1;
        $rol = $_POST['rol'];

        //creacion del encriptado de la contraseña
        if (!empty($contrasena)) {
            $contrasenaHas = password_hash($contrasena, PASSWORD_DEFAULT);
        }
        $usuarioExiste = $misusuarios->ViewUsuarios($identificacion);
        // validar la informacion si el usuario ya esta registrado
        if (count($usuarioExiste) < 1) {
            $data = [
                'nombre' => $nombre,
                'identificacion' => $identificacion,
                'correo' => $correo,
                'usuario' => $usuario,
                'contrasena' => $contrasenaHas,
                'estado' => $estado,
                'rol' => $rol
            ];

            if ($misusuarios->agregarUsuarios($data)) {
                echo 1; //usuario registrado
            } else {
                echo 0; //error a registrar el usuario
            }
        } else{
            echo 2; //usuario ya existe
        }
    }
}
