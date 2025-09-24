<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../servicios/val-propietarios.php';


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
    <title>Proyecto Piscicultura - Parámetros Estanques</title>
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
        <div id="tablaDetallesEstanque"></div>
    </div>

    <?php include_once "librerias-js.php"; ?>


    <script>
        $(document).ready(function () {
            $('#overlay').show();
            $('#tablaDetallesEstanque').load('vista_propietarios/vista_detallesEstanque.php?id_estanque=<?= $_GET["id_estanque"] ?>', function () {
                $('#mytable').DataTable();
                $('#overlay').fadeOut('slow');
            });
        });
    </script>

    <?php include_once 'footer.php'; ?>
</body>
</html>
