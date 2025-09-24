<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$nombre = isset($GLOBALS['user_nombre']) ? $GLOBALS['user_nombre'] : ''
?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Contenido Principal -->
    <div id="content" class="border shadow">
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top">
            <!-- Sección de la marca -->
            <div class="col-sm-1">
                <div class="container-fluid">
                    <a class="navbar-brand letra-sena-2024 pt-2" href="./index.php">
                        <img src="../imagenes/logo-sena.png" alt="Logo" width="40" height="40"
                             class="d-inline-block me-1">
                        Proyecto Piscícola
                    </a>
                </div>
            </div>

            <!-- Sección vacía -->
            <div class="col-sm-9"></div>
            <!-- Menú de usuario -->
            <div class="col-sm-3">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 d-none d-lg-inline text-gray-600 small"><?= $nombre  ?></span>
                            <div class="icon-circle bg-secondary">
                                <i class="fas fa-user-circle text-white"></i>
                            </div>
                        </a>
                        <!-- Menú Desplegable -->
                        <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                    Perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Fin de la Barra Superior -->

        <!-- Modal de Cierre de Sesión -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">¿Seguro desea cerrar sesión?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">Seleccione salir para cerrar sesión</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="../servicios/salir.php">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
