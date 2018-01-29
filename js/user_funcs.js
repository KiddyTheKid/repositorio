function realizarBusqueda() {
    var formulario = $("#user_body_search");
    $.ajax({
        type: 'POST',
        url: 'core/php/funcs/user_funcs.php',
        data: formulario.serialize() + "&op=0",
        success: function (data) {
            $("#resultado_busqueda").html(data);
        }
    });
}
function busquedaAvanzada() {
    var formulario = $("#user_body_search_advance");
    $.ajax({
        type: 'POST',
        url: 'core/php/funcs/user_funcs.php',
        data: formulario.serialize() + "&op=1",
        success: function (data) {
            $("#resultado_busqueda").html(data);
        }
    });

}
function toggleBusquedas() {
    var busquedaNormal = $("#busquedaNormal");
    var busquedaAvanzada = $("#busquedaAvanzada");
    if (busquedaNormal.css('display') == "none"){
        busquedaAvanzada.hide('slow');
        busquedaNormal.show('slow');
    } else {
        busquedaNormal.hide('slow');
        busquedaAvanzada.show('slow');
    }
}
