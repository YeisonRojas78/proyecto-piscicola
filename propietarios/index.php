<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../servicios/val-propietarios.php';
include_once '../servicios/datos_estanques.php';
include_once '../servicios/datos_peces.php';
include_once '../servicios/datos_ventas.php';
include_once '../servicios/datos_crecimiento.php';
include_once '../servicios/datosAlimentacion.php';
include_once '../servicios/datos_sensores.php';
include_once '../servicios/datos_alertas.php';
include_once '../servicios/datos_usuarios.php';
include_once '../servicios/datos_ParametrosAgua.php';
$estanques = new misEstanque();
$ventas = new misVentas();
$peces = new misPeces();
$crecimientoPeces = new misCrecimientos();
$alimentaciones = new misAlimentaciones();
$sensores = new misSensores();
$parametrosAgua = new misParametros();

// Objetos y conteos
if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $cantEstanques = $estanques->TotalEstanquesPropietarios($idUsuario);
    $cantCrecimientoPeces = $crecimientoPeces->TotalCrecimientoPecesPropietarios($idUsuario);

    // NUEVOS: Parámetros agua
    $cantParametros = $parametrosAgua->TotalParametrosAguaPropietarios($idUsuario);
    $promedios = $parametrosAgua->PromediosParametrosPropietarios($idUsuario);

    $cantPeces = $peces->TotalPecesPropietarios($idUsuario);
    $cantSensores = $sensores->TotalSensoresPropietarios($idUsuario);
    $cantVentas = $ventas->TotalVentasPropietarios($idUsuario);
    $cantAlimentacionPeces = $alimentaciones->TotalAlimentacionPecesPropietarios($idUsuario);

} else {
    echo "Usuario no autenticado";
    exit;
}
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piscicola</title>
    <?php
    include_once './librerias-css.php';
    ?>
</head>

<body id="page-top">

    <?php
    //include_once './menu.php';
    ?>

    <div class="container">
        <?php
        include_once './menu.php';
        ?>
        <?php

        include_once 'librerias-js.php';
        ?>

        <!-- Inicio del Contenido de la Página -->
        <div class="scrollable-container my-3">
            <div class="container-fluid">
                <h2 class="text-left">INFORMACIÓN GENERAL</h2>
                <!-- duplicado de informacion  -->

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <a href="./estanques.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Estanques
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantEstanques; ?></div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-water fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <a href="./ventas.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total ventas
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantVentas; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-currency-dollar fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="./peces.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Peces
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantPeces; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fish fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="./crecimientoPeces.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Crecimiento peces
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantCrecimientoPeces; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-line fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="./alimentacion.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Alimentación peces
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantAlimentacionPeces; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="./sensores.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Sensores
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantSensores ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-broadcast fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <a href="parametrosAgua.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Parámetros agua
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantParametros ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-bar-chart-line-fill fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <a href="./alertas.php">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Alertas
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantVentas ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-exclamation-circle-fill fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <h2 class="text-left">INDICADORES</h2>
                    <!-- duplicado de informacion  -->

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Temperatura Promedio
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Temperatura Promedio: <?= $promedios['temp_prom'] ?> °C</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-thermometer-half fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                PH Promedio
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">pH Promedio: <?= $promedios['ph_prom'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-vial fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Oxigeno Promedio
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Oxígeno Promedio: <?= $promedios['oxi_prom'] ?> mg/L</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-wind fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php
    include_once './footer.php';
    ?>

</body>

</html>