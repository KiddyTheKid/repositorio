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
