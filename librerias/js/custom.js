$(document).ready(function() {
    $('#sidebarToggle').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
});