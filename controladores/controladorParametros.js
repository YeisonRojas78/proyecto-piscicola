ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$('#selectEstanque').change(function () {
    const idEstanque = $(this).val();

    if (idEstanque) {
        $.ajax({
            type: 'POST',
            url: '../../modelo/accionesParametrosAgua.php?accion=listar',
            data: { id_estanque: idEstanque },
            dataType: 'json',
            success: function (data) {
                tabla.clear(); // Limpia tabla

                if (data.length > 0) {
                    data.forEach(param => {
                        tabla.row.add([
                            param.fecha,
                            param.temperatura,
                            param.ph,
                            param.oxigeno
                        ]);
                    });
                } else {
                    tabla.row.add([
                        "No hay datos disponibles",
                        "", "", ""
                    ]).nodes().to$().addClass('text-center text-muted');
                }

                tabla.draw(); // Refresca la tabla
            },
            error: function () {
                alert('Error al cargar los datos');
            }
        });
    } else {
        tabla.clear().draw(); // Limpia todo si no hay selección
    }
});
