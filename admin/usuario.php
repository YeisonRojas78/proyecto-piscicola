<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../servicios/val-admin.php';
require_once '../servicios/datos_usuarios.php';

//validacion de usuario
if ($GLOBALS['rol_user'] == 1) {
    $pagina = "Administrador";
} else {
    echo '<script language = javascript>
            alert("No tiene permiso para acceder a esta área.")
            window.location.href = "../index.php"
            </script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piscicola</title>

    <?php 
    include_once 'librerias-css.php';
    ?>

</head>    
<body class="cuerpo" id="page-top">

    <!-- Espiner para carga de información -->
    <div id="overlay">
        <div class="loader-container">
            <div class="loader"></div>
            <div class="loader-text">Cargando...</div>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="container mt-4">
        <?php include_once 'menu.php'; ?>
        <div id="tablaPropierarios"></div>
    </div>
    <?php include_once './modales/modalUsuario.php'; ?>


    <?php
    // include_once './modales/modalUsuario.php'; 
    include_once 'librerias-js.php';
    ?>
    
    <script src="../controladores/controladorUsuario.js"></script>
    <!-- FIN DEL CONTENIDO -->
    <script>
       $(document).ready(function () {
            $('#overlay').show();
            $('#tablaPropierarios').load('vista_admin/vista_Usuario.php', function () {
                $('#mytable').DataTable(); // Mover aquí
                $('#overlay').fadeOut('slow');
            });
             initUsuarios()
        });
    </script>

<?php
    include_once 'footer.php';
    ?>
</body>
</html>