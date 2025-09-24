<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
date_default_timezone_set("America/Bogota");

session_unset();
session_destroy();
?>

<script>
    localStorage.removeItem("cod_ingreso");
    alert("Sesi\u00f3n cerrada correctamente");
    location.href = "../index.php";
</script>


