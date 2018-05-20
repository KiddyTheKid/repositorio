let nPg = 0;
class Usuario{
	constructor(){
		this.id = null;
		this.cedula = null;
		this.nombres = null;
		this.apellidos = null;
		this.correo = null;
		this.telefono = null;
		this.direccion = null;
		this.nivel = null;
	}
	static get(i){
		$.ajax({
			type: 'POST',
			url : 'core/php/funcs/admin/search_usuario.php',
			data: {ide:i},
			success: function (data){
				let usr = JSON.parse(data);
				$("#cedula").val(usr.cedula);
				$("#nombres").val(usr.nombres);
				$("#apellidos").val(usr.apellidos);
				$("#correo").val(usr.correo);
				$("#telefono").val(usr.telefono);
				$("#direccion").val(usr.direccion);
			}
		});
	}
	static crear(){
		let form = $("#create_usuario_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/crear_usuario.php',
			data: form.serialize(),
			success: function (data){
				Usuario.getTabla(0);
				form[0].reset();
				$("#mensajes").html(data);
			}
		});
	}
	static editar(){
		let form = $("#edit_usuario_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/editar_usuario.php',
			data: form.serialize(),
			success: function (data){
				Usuario.getTabla(0);
				form[0].reset();
				$("#mensajes").html(data);
			}
		});
	}
	static borrar(i){
		if (!confirm("¿Está seguro que desea eliminar?")){
			return;
		}
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/eliminar_usuario.php',
			data: {ide:i},
			success: function (data){
				Usuario.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static getTabla(n){
		switch (n){
			case "+":
				nPg += 10;
				break;
			case "-":
				if (nPg != 0){
					nPg -= 10;
				}
				break;
		}
		let buscar = $("#searcher").val();
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/traer_usuarios.php',
			data: {pg:nPg, name: buscar},
			success: function (data){
				$("#tabla_usuarios").html(data);
			}
		});
	}
}
