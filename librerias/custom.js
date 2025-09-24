function cargarTabla() {
    $.ajax({
        type: "GET",
        url: "../modelo/accionesProgramas.php?accion=cargarTabla",
        success: function (data) {
            $('#tablaProgramas').html(data);
        }
    });
}

// Mostrar el popover al intentar acceder a la pagina aprendices 
// $(document).ready(function () {
//     // Inicializar el popover
//     $('#info-link').popover();

//     $('#info-link').on('click', function (event) {
//         event.preventDefault();
//         var $popover = $(this);
//         $popover.popover('show');
//         setTimeout(function () {
//             $popover.popover('hide');
//         }, 3000); // Cerrar el popover después de 3 segundos
//     });
// });

//Funcion para el cambio de pagina de navegacion
function showContent(sectionId) {
    // Ocultar todas las secciones
    var sections = document.querySelectorAll('.tab-content');
    sections.forEach(function (section) {
        section.style.display = 'none';
    });

    // Mostrar la sección seleccionada
    document.getElementById(sectionId).style.display = 'block';

    // Actualizar las clases activas de los tabs
    var tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(function (tab) {
        tab.classList.remove('active');
    });
    document.querySelector('[onclick="showContent(\'' + sectionId + '\')"]').classList.add('active');
}

//inhabilitar boton de cargua de archivos 
document.addEventListener("DOMContentLoaded", function () {
    const uploadButtons = document.querySelectorAll(".btn-upload");

    uploadButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Obtener el formulario más cercano al botón
            const formBitacora = button.closest(".modal-body").querySelector("form");

            // Deshabilitar el botón y mostrar un spinner
            button.disabled = true;
            button.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Subiendo...
            `;

            // Crear un FormData con los datos del formulario
            const formData = new FormData(formBitacora);
        });
    });
});






