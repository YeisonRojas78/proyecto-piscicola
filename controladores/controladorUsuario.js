ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function initUsuarios() {
    $('#formAgregarUsuarios').submit(function (evt) {
        evt.preventDefault();
        agregarusuarios();
    });
}
function agregarusuarios() {
    let formData = new FormData();
    formData.append('nombre', $('#nombre_propietario').val());
    formData.append('identificacion', $('#identificacion_propietario').val());
    formData.append('correo', $('#correo_propietario').val());
    formData.append('usuario', $('#usuario_propietario').val());
    formData.append('contrasena', $('#contrasena_propietario').val());
    formData.append('rol', $('#rol_propietario').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesUsuario.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'usuario creado con éxito.'
                }).then(() => {
                    $('#modalCrearUsuario').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar el usuario.'
                });
            }
        },
    });
}
