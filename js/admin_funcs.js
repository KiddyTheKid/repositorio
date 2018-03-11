const url = "core/php/funcs/admin/";
let nPg = 0;
function admin(pag) {
	addF(pag);
	w3.includeHTML();
}
function addF(a) {
	document.getElementById('op').setAttribute("w3-include-html","layout/" + a);
}
function logout(){
	$.ajax({
		type: 'POST',
		url: url + 'logout.php',
		success: function (){
			window.location.href = "";
		}
	});
}
function Exec(form) {
	window.console.log(form);
	var formulario = $("#" + form);
	$.ajax({
		type: 'POST',
		url: formulario.attr('action'),
		data: formulario.serialize(),
		success: function (data) {
			admin(formulario.attr("base"));
			$("#mensajes").html(data);
		}
	});
}
function ExecFile(accion, form, archivo) {
	let nform = form;
	let file = $("#" + archivo)[0].files;
    if(file.length === 0){
    	alert("No ha seleccionado archivo");
    } else {
    	let fd = new FormData();
    	let form = $("#" + form);
    	fd.append("archivo",file[0]);
    	let formda = form.serializeArray();
    	$.each(formda, function (key, input) {
    		fd.append(input.name, input.value);
    	});
    	fd.append("accion",accion);
    	$.ajax({
    		url: form.attr('action'),
    		data: fd,
    		contentType: false,
    		processData: false,
    		type: 'POST',
    		success: function(data){
    			document.getElementById(nform).reset();
    			$("#mensajes").html(data);
    		}
    	});
    }
}
function getAutor(id)
{
	$.ajax({
		type: 'POST',
		url: url + "search_autor.php",
		data: {ide:id},
		success: function (data){
			let persona = JSON.parse(data);
			$("#cedula").val(persona.cedula);
			$("#nombres").val(persona.nombres);
			$("#apellidos").val(persona.apellidos);
			$("#telefono").val(persona.telefono);
			$("#direccion").val(persona.direccion);
			$("#correo").val(persona.correo);
		}
	});
}
function delAutor(id)
{
	let res = confirm("¿Está seguro que desea eliminar?");
	if (res)
	{
		$.ajax({
			type: 'POST',
			url : url + "eliminar_autor.php",
			data: {ide:id},
			success: function (data){
				admin("admin_aut.php");
				$("#mensajes").html(data);
			}
		});
	}
}
function editarAutor()
{
	let form = $("#edit_autor_form");
	$.ajax({
		type: 'POST',
		url: url + "editar_autor.php",
		data: form.serialize(),
		success: function (data) {
			admin("admin_aut.php");
			$("#mensajes").html(data);
		}
	});		
}
function traerAutores(n)
{
	if (n == "+")
	{
		nPg += 10;
	}
	if (n == "-")
	{
		if (nPg != 0)
		{
			nPg -= 10;
		}
	}
	let nombre = $("#searcher").val();
	$.ajax({
		type: 'POST',
		url: url + "traer_autores.php",
		data: {pg:nPg, name: nombre},
		success: function (data){
			$("#tabla_autores").html(data);
		}
	});
}
function adChangePW() {
	$.ajax({
		type: 'POST',
		url: url + 'pw_update.php',
		data: $("#admin_changepass_form").serialize(),
		success: function (data) {
			document.getElementById('admin_changepass_form').reset();
			$("#mensajes").html(data);
		}
	});
}
