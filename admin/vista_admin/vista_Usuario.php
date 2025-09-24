<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../servicios/datos_usuarios.php';

$misUsuario = new misUsuarios();
$usuarios = $misUsuario->UsuariosAdmin();
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="alert alert-info text-center">
            <h1 class="mb-0"><strong>Listado de Propietarios</strong></h1>
            <small>Gestión de Usuarios Propietarios</small>
        </div>
        <!-- miga de pan -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 rounded" style="background-color:rgb(223, 223, 223);">
                <li class="breadcrumb-item">
                    <a href="./index.php" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Usuarios
                </li>
            </ol>
        </nav>


        <div class="mb-3">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">
                <i class="bi bi-person-plus"></i> Agregar Usuario
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaPropietariosData" class="table table-striped table-bordered align-middle w-100">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID Propietario</th>
                        <th>Nombre Propietario</th>
                        <th>Correo</th>
                        <th>Identificación</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Asegúrate de que $usuarios es un array y contiene los datos esperados
                    if (isset($usuarios) && is_array($usuarios)) {
                        foreach ($usuarios as $usuario) :
                            $datosAp = $usuario['id_usuario'] . "||" .
                                $usuario['nombre'] . "||" .
                                $usuario['correo'] . "||" .
                                $usuario['identificacion'] . "||" .
                                $usuario['usuario'] . "||" .
                                $usuario['rol'];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $usuario["id_usuario"]; ?></td>
                                <td><?php echo $usuario["nombre"]; ?></td>
                                <td><?php echo $usuario["correo"]; ?></td>
                                <td><?php echo $usuario["identificacion"]; ?></td>
                                <td><?php echo $usuario["usuario"]; ?></td>
                                <td><?php echo $usuario["rol"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuarios" data-id="<?php echo $usuario['id_usuario']; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    } else {
                        // Mensaje si no hay usuarios para mostrar
                        // Contar el número de columnas para el colspan
                        $num_columnas_propietarios = 9; // ID, Nombre, Correo, Identificación, Usuario, Contraseña, Rol, Editar, Eliminar
                        echo '<tr><td colspan="' . $num_columnas_propietarios . '" class="text-center">No hay usuarios propietarios registrados.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaPropietariosData').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
            },
            order: [
                [0, 'asc']
            ], // Ordena por la primera columna (ID Propietario) de forma ascendente por defecto
            pageLength: 10 // Muestra 10 registros por página por defecto, ajusta según necesites
        });
    });
</script>