<?php
// session_start();
require_once 'datos_usuarios.php';
$mis_usuarios = new misUsuarios();
if (!empty($_SESSION)) {
    $user_id = $_SESSION['identificacion'];
    $user_nombre = $_SESSION['nombre'];
    $user_usuario = $_SESSION['usuario'];
    $user_contrasena = $_SESSION['contrasena'];
    $user_email = $_SESSION['correo'] ?? '';
    $rol_user = $_SESSION['rol'];
    $user_estado = $_SESSION['estado'];
    /** Información del usuario */
    $mi_usuario = $mis_usuarios->ViewUsuarios($user_id);
    if ($mi_usuario) {
        /** Valida si el usuario de la sesión corresponde **/
        if ($user_id != $mi_usuario[0]['identificacion']) {
            session_destroy();
            echo '<script language = javascript>
            alert("Por favor revisar la información del usuario 1.")
            self.location = "../index.php"
            </script>';
        }
    } else {
        echo '<script language = javascript>
        alert("Por favor revisar la información del usuario 2.")
        self.location = "../index.php"
        </script>';
    }
} else {
    $user_id = "";
    $user_nombre = "";
    $user_usuario = "";
    $user_contrasena = "";
    $user_email = "";
    $rol_user = "";
    $user_estado = "";
    $user_centro = "";
    echo '<script language = javascript>
    alert("Por favor revisar la información del usuario 3.")
    self.location = "../index.php"
    </script>';
}
