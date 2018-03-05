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
		url: 'core/php/funcs/admin/logout.php',
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
			document.getElementById(form).reset();
			$("#mensajes").html(data);
		}
	});
}
function ExecFile(accion, form, archivo) {
	var nform = form;
	var file = $("#" + archivo)[0].files;
    if(file.length === 0){
    	alert("No ha seleccionado archivo");
    } else {
    	var fd = new FormData();
    	var form = $("#" + form);
    	fd.append("archivo",file[0]);
    	var formda = form.serializeArray();
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
function adChangePW() {
	$.ajax({
		type: 'POST',
		url: 'core/php/funcs/admin/pw_update.php',
		data: $("#admin_changepass_form").serialize(),
		success: function (data) {
			document.getElementById('admin_changepass_form').reset();
			$("#mensajes").html(data);
		}
	});
}
