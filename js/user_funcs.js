var textoBusqueda, searchMode, resultadoContainer;

function crearTarjeta(info) {
    let a = document.createElement('a');
    a.href = `../repoFiles/${info.ruta}`;
    a.target = "_blank";
    a.style = "text-decoration: none; color: black;";
    let divCard = document.createElement('div');
    divCard.classList.add('card');
    let divCardBody = document.createElement("div");
    divCardBody.classList.add('card-body');
    divCardBody.innerHTML = `<div><strong>${info.tema}</strong></div><div>Por: ${info.autor}</div><div>Tipo: ${info.tipo_doc}</div>`;
    divCardBody.innerHTML += `<div>Carrera: ${info.especialidad}</div><div>Fecha: ${info.fecha_subida}</div>`;
    divCard.appendChild(divCardBody);
    a.appendChild(divCard);
    return a;
}

function realizarBusqueda(campoTextoParam) {
    let campoTexto = document.getElementsByName(campoTextoParam)[1];
	var message = {
		busqueda: campoTexto.value,
		op: 0
	};
    $.ajax({
        type: 'POST',
        url: 'core/php/funcs/user_funcs.php',
        data: message,
        success: function (data) {
            resultadoContainer.innerHTML = "";
            data.forEach(function(info){
                resultadoContainer.appendChild(crearTarjeta(info));
            });
        }
    });
}
function busquedaAvanzada(campoTextoParam) {
    let campoTexto = document.getElementsByName(campoTextoParam)[0];
	let domCarrera = document.getElementById("carrera");
	let domTipoDoc = document.getElementById("tipo_doc");
	let domFecha = document.getElementById("fecha");
	let message = {
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
            resultadoContainer.innerHTML = "";
            data.forEach(function(info){
                resultadoContainer.appendChild(crearTarjeta(info));
            });
        }
    });

}

window.onload = function () {
    textoBusqueda = document.getElementsByName("busqueda");
    for (let i = 0; i < textoBusqueda.length; i++) {
        textoBusqueda[i].addEventListener('keypress', function (evento) {
           if (this.key === 13){
               evento.preventDefault();
           }
        });
    }
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
    //resultadoContainer = $("#resultado_busqueda");
    resultadoContainer = document.getElementById("resultado_busqueda");
}