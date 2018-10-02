var textoBusqueda, searchMode, resultadoContainer;


function realizarBusqueda(campoTexto) {
	var message = {
		busqueda: campoTexto.value,
		op: 0
	};
    $.ajax({
        type: 'POST',
        url: 'core/php/funcs/user_funcs.php',
        data: message,
        success: function (data) {
            resultadoContainer.html(data);
        }
    });
}
function busquedaAvanzada(campoTexto) {
	var domCarrera = document.getElementById("carrera");
	var domTipoDoc = document.getElementById("tipo_doc");
	var domFecha = document.getElementById("fecha");
	var message = {
		busqueda: campoTexto.value,
		carrera: domCarrera.value,
		tipo_doc: domTipoDoc.value,
		fecha: domFecha.value,
		op: 1
	};
    $.ajax({
        type: 'POST',
        url: 'core/php/funcs/user_funcs.php',
        data: message,
        success: function (data) {
            resultadoContainer.html(data);
        }
    });

}

window.onload = function () {
    textoBusqueda = document.getElementsByName("busqueda");
    textoBusqueda[0].addEventListener("keypress",function(e){
        if (e.keyCode == 13) {
            busquedaAvanzada(this);
        }
    });
    textoBusqueda[1].addEventListener("keypress", function(e){
        if (e.keyCode == 13) {
            realizarBusqueda(this);
        }
    });
    searchMode = {
        normalMode: $("#busquedaNormal"),
        advanceMode: $("#busquedaAvanzada"),
        btnTogglers: document.getElementsByName("toggle-busqueda"),
        isAdvanced: false
    };
    Array.from(searchMode.btnTogglers).forEach(function(dom){
        dom.addEventListener("click", function(){
            if (!searchMode.isAdvanced) {
                searchMode.normalMode.hide('slow');
                searchMode.advanceMode.show('slow');
            } else {
                searchMode.advanceMode.hide('slow');
                searchMode.normalMode.show('slow');
            }
            searchMode.isAdvanced = !searchMode.isAdvanced;
        });
    });
    resultadoContainer = $("#resultado_busqueda");
}