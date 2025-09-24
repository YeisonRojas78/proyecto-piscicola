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
    <title>Proyecto piscicultura</title>
    <?php include_once "librerias-css.php"; ?>
</head>

<body id="page-top" class="cuerpo">

    

    <!-- Spinner para carga de información -->
    <div id="overlay">
        <div class="loader-container">
            <div class="loader"></div>
            <div class="loader-text">cargando...</div>
        </div>
    </div>
    

    <!-- Contenido principal -->
    <div class="container mt-4">
        <?php include_once 'menu.php'; ?>
        <div id="tablaAlertas"></div>
    </div>

    <!-- Modales -->


    <!-- Librerías JS -->
    <?php include_once "librerias-js.php"; ?>
    <script src="../../controladores/controladorEstanques.js"></script>
    <script>
        $(document).ready(function () {
            $('#overlay').show();
            $('#tablaAlertas').load('vista_propietarios/vistaAlertas.php', function () {
                $('#mytable').DataTable(); // Mover aquí
                $('#overlay').fadeOut('slow');
            });
             
        });
    </script>

    <?php include_once 'footer.php'; ?>

</body>

</html>
