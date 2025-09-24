ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function initSensores() {
    $('#formAgregarSensor').submit(function (evt) {
        evt.preventDefault();
        agregarSensor();
    });
}

function agregarSensor() {
    let formData = new FormData();
    formData.append('id_estanque', $('#estanque_idSensores').val());
    formData.append('tipo', $('#tipo_sensorPropietario').val());
    formData.append('modelo', $('#modeloSensorPropietario').val());
    formData.append('numero_serie', $('#serieSensorPropietario').val());
    formData.append('estado', $('#estadoSensorPropietario').val());
    formData.append('fecha_instalacion', $('#fecha_horaSensor').val());
    

    $.ajax({
        method: "POST",
        url: "../modelo/accionesSensores.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'sensor creado con éxito.'
                }).then(() => {
                    $('#modalAgregarSensor').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar el sensor.'
                });
            }
        },
    });
}
