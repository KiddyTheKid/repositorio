let nPgg = 0;
class Autor{
	constructor(){
		this.id = null;
		this.cedula = null;
		this.nombres = null;
		this.apellidos = null;
		this.correo = null;
		this.telefono = null;
		this.direccion = null;
	}
	static get(i){
		$.ajax({
			type: 'POST',
			url : 'core/php/funcs/admin/search_autor.php',
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
		let form = $("#create_autor_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/crear_autor.php',
			data: form.serialize(),
			success: function (data){
				Autor.getTabla(0);
				form[0].reset();
				$("#mensajes").html(data);
			}
		});
	}
	static editar(){
		let form = $("#edit_autor_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/editar_autor.php',
			data: form.serialize(),
			success: function (data){
				Autor.getTabla(0);
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
			url: 'core/php/funcs/admin/eliminar_autor.php',
			data: {ide:i},
			success: function (data){
				Autor.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static getTabla(n){
		switch (n){
			case "+":
				nPgg += 10;
				break;
			case "-":
				if (nPgg != 0){
					nPgg -= 10;
				}
				break;
		}
		let buscar = $("#searcher").val();
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/traer_autores.php',
			data: {pg:nPgg, name: buscar},
			success: function (data){
				$("#tabla_autores").html(data);
			}
		});
	}
}
