<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto piscícola</title>
    <link href="./assets/favicon.ico" rel="icon" type="image/x-icon" id="favicon">
    <link rel="stylesheet" href="./librerias/css/sb-admin-2.min.css" >
    <link rel="stylesheet" href="./librerias/custom.css" >
</head>

<body id="page-login">

<div class="contenedor">
    <!-- Panel Izquierdo -->
    <div class="panel-izquierdo">
        <div class="contenedor-logos">
            <div class="logo-login me-2">
                <img src="./assets/logo_sena2023.png" id="logo-sena" class="img-fluid" alt="Logo Sena" />
            </div>
        </div>
        <div class="text-bienvenida" id="bienvenidaText">¡Bienvenido al Sistema de Gestión Piscícola!</div>
        <div class="bienvenida-subtitulo" id="bienvenidaSub">Por favor, ingresa tus datos para acceder al sistema.</div>
        <div class="row justify-content-center mt-4">
            <div class="logo-tecno">
                <img src="./assets/logo-tecnoparque.png" id="logo-tecno" class="img-fluid" alt="Logo Tecnoparque" />
            </div>
        </div>
    </div>

    <!-- Formulario de Inicio de Sesión -->
    <div class="panel-derecho">
        <div class="form-contenedor form-login" id="loginForm">
            <div class="card shadow p-4">
                <h2 class="form-title text-center">INICIAR SESIÓN</h2>
                <form action="./servicios/login.php" method="POST">
                    <div class="form-group mt-3">
                        <input type="text" id="usu" name="usu" class="form-control form-input" placeholder="ID Usuario" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" id="pass" name="pass" class="form-control form-input" placeholder="Contraseña" required>

                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" title="iniciar" class="btn btn-success submit-btn">INICIAR SESIÓN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-login text-center">
    <p>SISTEMA Version <a href="#" style="text-decoration-line: underline">1.0.0</a> &copy; Gestión Piscícola 2025 - SENA CEDRUM Norte de Santander - Colombia<br />
        Desarrollado por: Tecnoparque Nodo Cúcuta - Aprendices ADSO Yeison Rojas - Juliette Gonzalez</p>
</footer>

<!-- Scripts -->
<script src="./librerias/vendor/jquery/jquery.min.js"></script>
<script src="./librerias/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
