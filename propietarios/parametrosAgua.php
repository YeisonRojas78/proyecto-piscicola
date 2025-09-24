<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../servicios/val-propietarios.php';
require_once '../servicios/datos_ParametrosAgua.php';

//validacion de usuario
if ($GLOBALS['rol_user'] == 2) {
    $pagina = "Propietario";
} else {
    echo '<script language = javascript>
            alert("No tiene permiso para acceder a esta área.")
            window.location.href = "../index.php"
            </script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto Piscicultura - Parámetros Agua</title>
    <?php include_once "librerias-css.php"; ?>
</head>
<body id="page-top" class="cuerpo">

    <div id="overlay">
        <div class="loader-container">
            <div class="loader"></div>
            <div class="loader-text">Cargando...</div>
        </div>
    </div>

    <div class="container mt-4">
        <?php include_once 'menu.php'; ?>
        <div id="tablaParametrosEstanque"></div>
    </div>

    <?php include_once "librerias-js.php"; ?>
    <script src="../controladores/controladorParametros.js"></script>

    <script>
        $(document).ready(function () {
            $('#overlay').show();
            $('#tablaParametrosEstanque').load('vista_propietarios/vista_ParametrosAgua.php', function () {
                $('#mytable').DataTable();
                $('#overlay').fadeOut('slow');
            });
        });
    </script>

    <?php include_once 'footer.php'; ?>
</body>
</html>
