function initVentas() {
    $('#formCrearVenta').submit(function (evt) {
        evt.preventDefault();
        agregarVenta();
    });
}

function agregarVenta() {
    let formData = new FormData();
    formData.append('fecha', $('#crear_fecha_venta').val());
    formData.append('peces_id', $('#especiePecesventas').val());
    formData.append('cantidad_peces', $('#crear_cantidad_peces').val());
    formData.append('peso_venta', $('#crear_peso').val());
    formData.append('precio_venta', $('#crear_precio').val());
    formData.append('nombre_comprador', $('#crear_nombre_comprador').val());
    formData.append('identificacion_comprador', $('#crear_identificacion_comprador').val());


    $.ajax({
        method: "POST",
        url: "../modelo/accionesVentas.php?accion=registrar",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log("Respuesta:", r);
            if (r == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'venta creada con éxito.'
                }).then(() => {
                    $('#modalCrearVenta').modal('hide');
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar la venta.'
                });
            }
        },
    });
}
$(document).ready(function () {
    initVentas();
});

$(document).on("click", ".btnEditarVenta", function () {
    const btn = $(this);

    //rellenar campos
    $("#editar_id_venta").val(btn.data("id-venta"));
    $("#editar_fecha").val(btn.data("fecha"));
    $("#editar_pez").val(btn.data("peces_id")); // No estoy seguro de si esto es correcto, ya que el select tiene opciones con valores diferentes
    $("#editar_cantidad").val(btn.data("cantidad-peces"));
    $("#editar_peso").val(btn.data("peso-venta"));
    $("#editar_precio").val(btn.data("precio-venta"));
    $("#editar_nombre_comprador").val(btn.data("nombre-comprador"));
    $("#editar_identificacion_comprador").val(btn.data("identificacion-comprador"));
});

//enviat formulario de editar
$("#formEditarVenta").on("submit", function (e) {

    e.preventDefault();
    let formData = new FormData()
    formData.append('accion', 'editar');
    formData.append('id_venta', $('#editar_id_venta').val());
    formData.append('fecha', $('#editar_fecha').val());
    formData.append('peces_id', $('#editar_especiePecesventas').val());
    formData.append('cantidad_peces', $('#editar_cantidad').val());
    formData.append('peso_venta', $('#editar_peso').val());
    formData.append('precio_venta', $('#editar_precio').val());
    formData.append('nombre_comprador', $('#editar_nombre_comprador').val());
    formData.append('identificacion_comprador', $('#editar_identificacion_comprador').val());

    $.ajax({
        method: "POST",
        url: "../modelo/accionesVentas.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (r) {
            console.log(r);
            if (r == 1) {
                Swal.fire("Actualizado", "Ventas editadas correctamente", "success").then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire("Error", "No se pudo editar la venta", "error");
            }
        },
    });
});
// eliminar venta
//Cuando se abre el modal de edición y se hace clic en "Eliminar"
$("btnAbrirModalEliminarVentaAdmin").on("click", function () {
        const id = $("#editar_id_venta").val(); // desde el formulario de edición
        $("#id_ventas_a_eliminar").val(id); // lo pasamos al modal de confirmación
});

$("#modalEliminarVentaAdmin .btn-danger").on("click", function () {
    const id_venta = $("#id_ventas_a_eliminar").val();

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
            formData.append("id_venta", id_venta);

            $.ajax({
                method: "POST",
                url: "../modelo/accionesVentas.php",
                processData: false,
                contentType: false,
                success: function (r) {
                    if (r == "1") {
                        Swal.fire("Eliminado", "la venta fue eliminada correctamente.", "success").then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire("Error", "No se pudo eliminar la venta.", "error");
                    }
                }
            });
        }
    });

    $("#modalEliminarVentaAdmin").modal("hide");
});