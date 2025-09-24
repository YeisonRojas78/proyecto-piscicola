
function initPeces() {
    $('#formAgregarPeces').submit(function (evt) {
        evt.preventDefault();
        agregarPeces();
    });
    $('#formEditarPecesAdmin').on('submit', function (e) {
        e.preventDefault(); // 🔒 Detiene el envío normal por GET
        EditarPeces();      // 🔁 Llama tu función AJAX
    });

    $('#formEditarPecesPropietario').submit(function (evt) {
        evt.preventDefault();
        EditarPecesPropietario();
    });

}

function agregarPeces() {
    let formData = new FormData();
    formData.append('id_estanque', $('#estanque_idPeces').val());
    formData.append('especie', $('#especiePez').val());
    formData.append('cantidad', $('#cantidadPez').val());
    formData.append('peso_promedio', $('#peso_promedioPez').val());
    formData.append('fecha_ingreso', $('#fecha_ingresoPez').val());
    formData.append('estado', $('#estadoPez').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesPeces.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Peces creados con éxito.'
                }).then(() => {
                    $('#modalCrearPezPropietario').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar los peces.'
                });
            }
        },
    });
}

function llenarEditarPeces(peces) {
    let p = peces.split('||');

    $('#editar_idPez_admin').val(p[0]);
    $('#id_estanques_admin').val(p[1]);
    $('#editar_especie_admin').val(p[2]);
    $('#editar_cantidad_admin').val(p[3]);
    $('#editar_peso_promedio_admin').val(p[4]);
    $('#editar_fecha_ingreso_admin').val(p[5]);
    $('#editar_estado_admin').val(p[6]);

    // Mostrar el modal después de llenar los datos
    $('#modalEditarPezAdmin').modal('show');
}

function EditarPeces() {
    console.log("¡Se llamó EditarPeces!");
    let formData = new FormData();

    formData.append('id_peces', $('#editar_idPez_admin').val());
    formData.append('estanques_id', $('#id_estanques_admin').val()); // ✅ este debe ser el ID válido
    formData.append('especie', $('#editar_especie_admin').val());
    formData.append('cantidad', $('#editar_cantidad_admin').val());
    formData.append('peso_promedio', $('#editar_peso_promedio_admin').val());
    formData.append('fecha_ingreso', $('#editar_fecha_ingreso_admin').val());
    formData.append('estado', $('#editar_estado_admin').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesPeces.php?accion=modificar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Peces editados con éxito.'
                }).then(() => {
                    $('#modalEditarPezAdmin ').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al editar los peces.'
                });
            }
        },
    });
}


function llenarEditarPecesPropietario(peces) {
    let p = peces.split('||');

    $('#editar_idPez_propietario').val(p[0]);
    $('#id_estanques_propietario').val(p[1]);
    $('#editar_especie_propietario').val(p[2]);
    $('#editar_cantidad_propietario').val(p[3]);
    $('#editar_peso_promedio_propietario').val(p[4]);
    $('#editar_fecha_ingreso_propietario').val(p[5]);
    $('#editar_estado_propietario').val(p[6]);

    // Mostrar el modal después de llenar los datos
    $('#modalEditarPezPropietario').modal('show');
}
function EditarPecesPropietario() {
    console.log("¡Se llamó EditarPeces!");
    let formData = new FormData();

    formData.append('id_peces', $('#editar_idPez_propietario').val());
    formData.append('estanques_id', $('#id_estanques_propietario').val()); // ✅ este debe ser el ID válido
    formData.append('especie', $('#editar_especie_propietario').val());
    formData.append('cantidad', $('#editar_cantidad_propietario').val());
    formData.append('peso_promedio', $('#editar_peso_promedio_propietario').val());
    formData.append('fecha_ingreso', $('#editar_fecha_ingreso_propietario').val());
    formData.append('estado', $('#editar_estado_propietario').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesPeces.php?accion=modificarPropietario",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Peces editados con éxito.'
                }).then(() => {
                    $('#modalEditarPezPropietario').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al editar los peces.'
                });
            }
        },
    });
}

