ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function initAlimentaciones() {
    $('#formAgregaralimentacion').submit(function (evt) {
        evt.preventDefault();
        agregarAlimentacion();
    });
}

function agregarAlimentacion() {
    let formData = new FormData();
    formData.append('peces_id', $('#especiePecesAlimento').val());
    formData.append('fecha_hora', $('#fecha_horaAlimentacion').val());
    formData.append('tipo_alimento', $('#tipo_alimentoAlimentacion').val());
    formData.append('cantidad_alimento', $('#cantidadAlimentacion').val());
    formData.append('observaciones', $('#observacionesAlimentacion').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesAlimentaciones.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Alimentacion creada con éxito.'
                }).then(() => {
                    $('#modalCrearAlimentacion').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar la alimentacion.'
                });
            }
        },
    });
}
