$(function () {
    //Botones y Formularios
    var index_boton_buscar = $('#index_boton_buscar');
    var index_boton_bavanzada = $('#index_boton_bavanzada');
    var index_inicio_avanzado = $('#index_inicio_avanzado');
    var index_inicio_normal = $('#index_inicio_normal');
    var index_inicio_resultados = $('#index_resultados');
    var index_form_busqueda_normal = $('#index_form_busqueda_normal');
    index_boton_bavanzada.click(function () {
        ocultar_mostrar(index_inicio_normal, index_inicio_avanzado)
    });
    index_form_busqueda_normal.bind('submit', function () {
        buscar($(this));
        return false;
    });
});
function ocultar_mostrar(vista1, vista2) {
    vista1.fadeOut('slow', function () {
        vista2.fadeIn('slow');
    });
}
function buscar(formulario) {
    $.ajax({
        type:'POST',
        url: formulario.attr('action'),
        data: formulario.serialize(),
        success: function (data) {
            alert(data);
        }
    });
}