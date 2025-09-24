function initEstanque() {
    $('#agregarestanquepropietario').click(function  (evt){
        evt.preventDefault();
        agregarEstanque();


    });
}
function agregarEstanque(){
    let formData = new FormData();
    formData.append('nombre_propietario', $('#usuario_idAdmin').val());
    formData.append('estanque', $('#nombre_estanquePropietario').val());
    formData.append('ubicacion', $('#ubicacionPropietario').val());
    formData.append('capacidad', $('#capacidadPropietario').val());
    formData.append('estado', $('#estado_estanquePropietario').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesEstanques.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error, no se puede registrar el estanque'
                });
            } else if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Estanque creado con éxito.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }
        },
    });
}
// Escuchar clicks sobre botones de editar
$(document).on("click", ".btnEditarEstanque", function () {
    const btn = $(this);

    // Rellenar campos
    $("#editar_id_estanque").val(btn.data("id"));
    $("#crear_nombre_estanqueu").val(btn.data("nombre"));
    $("#crear_ubicacionu").val(btn.data("ubicacion"));
    $("#crear_capacidadu").val(btn.data("capacidad"));
    $("#estado_estanqueu").val(btn.data("estado"));
    $("#usuario_idPropietario").val(btn.data("usuario"));
});

// Enviar formulario de edición
$("#formEditarEstanque").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData();
    formData.append("accion", "editar");
    formData.append("id_estanque", $("#editar_id_estanque").val());
    formData.append("usuarios_id", $("#usuario_idPropietario").val());
    formData.append("nombre", $("#crear_nombre_estanqueu").val());
    formData.append("ubicacion", $("#crear_ubicacionu").val());
    formData.append("capacidad", $("#crear_capacidadu").val());
    formData.append("estado", $("#estado_estanqueu").val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesEstanques.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log(r);
            if (r == 1) {
                Swal.fire("Actualizado", "Estanque editado correctamente", "success").then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire("Error", "No se pudo editar el estanque", "error");
            }
        },
    });
});
// eliminar estanque propietario

// Cuando se abre el modal de edición y se hace clic en "Eliminar"
$("#btnAbrirModalEliminar").on("click", function () {
    const id = $("#editar_id_estanque").val(); // ✅ así seleccionas el input hidden correctamente
    // desde el formulario de edición
    $("#id_estanque_a_eliminarPropietario").val(id); // lo pasamos al modal de confirmación
});

// Al confirmar eliminación desde modalEliminarEstanqueAdmin
$("#modalEliminarEstanque .btn-danger").on("click", function () {
    const idEstanque = $("#id_estanque_a_eliminarPropietario").val();

    Swal.fire({
        title: "¿Estás segura?",
        text: "Esta acción no se puede deshacer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let formData = new FormData();
            formData.append("accion", "eliminar");
            formData.append("id_estanque", idEstanque);

            $.ajax({
                method: "POST",
                url: "../modelo/accionesEstanques.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (r) {
                    if (r == "1") {
                        Swal.fire("Eliminado", "El estanque fue eliminado correctamente.", "success").then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire("Error", "No se pudo eliminar el estanque.", "error");
                    }
                }
            });
        }
    });

    // Cerrar modal de confirmación
    $("#modalEliminarEstanque").modal("hide");
});



// Llenar el modal de edición como admin
$(document).on("click", ".btnEditarEstanqueAdmin", function () {
    const btn = $(this);

    $("#id_estanque_admin").val(btn.data("id_estanque"));
    $("#nombre_estanque_admin").val(btn.data("nombre"));
    $("#ubicacion_estanque_admin").val(btn.data("ubicacion"));
    $("#capacidad_estanque_admin").val(btn.data("capacidad"));
    $("#estado_estanque_admin").val(btn.data("estado"));
    $("#usuario_idAdmin").val(btn.data("usuarios_id")); // importante usar el nombre correcto
});

// Enviar formulario de edición admin
$("#formEditarEstanqueAdmin").on("submit", function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append("accion", "editar_admin");
    formData.append("id_estanque", $("#id_estanque_admin").val());
    formData.append("usuarios_id", $("#usuario_idAdmin").val());
    formData.append("nombre", $("#nombre_estanque_admin").val());
    formData.append("ubicacion", $("#ubicacion_estanque_admin").val());
    formData.append("capacidad", $("#capacidad_estanque_admin").val());
    formData.append("estado", $("#estado_estanque_admin").val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesEstanques.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta admin:", r);
            if (parseInt(r) === 1) {
                Swal.fire("Actualizado", "Estanque editado correctamente", "success").then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire("Error", "No se pudo editar el estanque (admin)", "error");
            }
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            Swal.fire("Error", "Fallo la petición AJAX", "error");
        }
    });
});

//eliminar estanque admin

// Cuando se abre el modal de edición y se hace clic en "Eliminar"
$("#btnAbrirModalEliminarAdmin").on("click", function () {
    const id = $("#id_estanque_admin").val(); // desde el formulario de edición
    $("#id_estanque_a_eliminar").val(id); // lo pasamos al modal de confirmación
});

// Al confirmar eliminación desde modalEliminarEstanqueAdmin
$("#modalEliminarEstanqueAdmin .btn-danger").on("click", function () {
    const idEstanque = $("#id_estanque_a_eliminar").val();

    Swal.fire({
        title: "¿Estás segura?",
        text: "Esta acción no se puede deshacer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let formData = new FormData();
            formData.append("accion", "eliminar");
            formData.append("id_estanque", idEstanque);

            $.ajax({
                method: "POST",
                url: "../modelo/accionesEstanques.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (r) {
                    if (r == "1") {
                        Swal.fire("Eliminado", "El estanque fue eliminado correctamente.", "success").then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire("Error", "No se pudo eliminar el estanque.", "error");
                    }
                }
            });
        }
    });

    // Cerrar modal de confirmación
    $("#modalEliminarEstanqueAdmin").modal("hide");
});