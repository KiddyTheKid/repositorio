$(function () {
    //Botones y Formularios
    var index_boton_buscar = $('#index_boton_buscar');
    var index_boton_bavanzada = $('#index_boton_bavanzada');
    var index_inicio_avanzado = $('#index_inicio_avanzado');
    var index_inicio_normal = $('#index_inicio_normal');
    index_boton_bavanzada.click(function () {
        ocultar_mostrar(index_inicio_normal, index_inicio_avanzado)
    });



});
function ocultar_mostrar(vista1, vista2) {
    vista1.fadeOut('slow', function () {
        vista2.fadeIn('slow');
    });
}