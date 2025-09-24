<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'conexion.php';
$conexion = new Conexion();

// Recibimos los datos del formulario
if (isset($_POST['usu']) && isset($_POST['pass'])) {
    $loginNombre = $_POST["usu"];
    $loginPassword = $_POST["pass"];

    // Buscar el usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = :loginNombre";
    $modules = $conexion->prepare($sql);
    $modules->bindParam(":loginNombre", $loginNombre);
    $modules->execute();
    $row = $modules->fetch(PDO::FETCH_ASSOC);

    // Validamos
    if ($row && (password_verify($loginPassword, $row['contrasena']) || $loginPassword === $row['contrasena'])) {
        if ($row['estado'] == 1) {
            // Guardar variables en sesión
            $_SESSION['identificacion'] = $row['identificacion'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['contrasena'] = $row['contrasena'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['estado'] = $row['estado'];
            $_SESSION['id_usuario'] = $row['id_usuario'];

            // Direccionar según el rol
            if ($row['rol'] == 1) {
                header("Location: ../admin/index.php");
                exit();
            } elseif ($row['rol'] == 2) {
                header("Location: ../propietarios/index.php");
                exit();
            }
        } else {
            echo '<script>
                alert("Cuenta desactivada.");
                window.location.href = "../index.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Usuario o contraseña incorrectos.");
            window.location.href = "../index.php";
        </script>';
    }
}
?>
