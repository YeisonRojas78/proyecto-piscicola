ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function initCrecimiento() {
    $('#formAgregarcrecimiento').submit(function (evt) {
        evt.preventDefault();
        agregarCrecimiento();
    });

    $('#formEditarCrecimiento').submit(function (evt) {
        evt.preventDefault();
        EditarCrecimiento();
    });
}

function agregarCrecimiento() {
    let formData = new FormData();
    formData.append('peces_id', $('#especiePecescrecimiento').val());
    formData.append('fecha', $('#fechaCrecimiento').val());
    formData.append('peso', $('#pesoCrecimiento').val());
    formData.append('longitud', $('#longitudCrecimiento').val());
    formData.append('observaciones', $('#observacionesCrecimiento').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesCrecimiento.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'crecimiento creado con éxito.'
                }).then(() => {
                    $('#modalCrearCrecimientoPropietarios').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar el crecimienro.'
                });
            }
        },
    });
}

function llenarEditarCrecimiento(crecimientos) {
    let c = crecimientos.split('||');
    $('#editar_idCrecimiento').val(c[0]);
    $('#editar_especiePecescrecimiento').val(c[1]);
    $('#editar_fechaCrecimiento').val(c[2]);
    $('#editar_pesoCrecimiento').val(c[3]);
    $('#editar_longitudCrecimiento').val(c[4]);
    $('#editar_observacionesCrecimiento').val(c[5]);
}

function EditarCrecimiento(){
    $('#editar_id_crecimiento').val(c[0]);
    $('#editar_especie').val(c[1]);
    $('#editar_nombre_estanque').val(c[2]);
    $('#editar_fecha').val(c[3]);
    $('#editar_peso').val(c[4]);
    $('#editar_longitud').val(c[5]);
    $('#editar_observaciones').val(c[6]);

    $.ajax({
        method: "POST",
        url: "../modelo/accionesCrecimiento.php?accion=editar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log(r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Crecimiento editado con éxito.'
                }).then(() => {
                    $('#modalEditarCrecimientoPropietarios').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al editar el crecimiento.'
                });
            }
        },
    });

}
