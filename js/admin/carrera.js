let Capg = 0;
class Carrera{
	constructor(){
		this.id = null;
		this.descripcion;
	}
	static get(i){
		$.ajax({
			type: 'POST',
			url : 'core/php/funcs/admin/search_especialidad.php',
			data: {id:i},
			success: function (data){
				let car = JSON.parse(data);
				$("#id").val(car.id);
				$("#descripcion").val(car.descripcion);
			}
		});
	}
	static crear(){
		let form = $("#create_carrera_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/crear_especialidad.php',
			data: form.serialize(),
			success: function (data){
				Carrera.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static editar(){
		let form = $("#edit_carrera_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/editar_especialidad.php',
			data: form.serialize(),
			success: function (data){
				Carrera.getTabla(0);
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
			url: 'core/php/funcs/admin/eliminar_especialidad.php',
			data: {ide:i},
			success: function (data){
				Carrera.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static getTabla(n){
		switch (n){
			case "+":
				Capg += 10;
				break;
			case "-":
				if (Capg != 0){
					Capg -= 10;
				}
				break;
		}
		let buscar = $("#searcher").val();
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/traer_especialidades.php',
			data: {pg:Capg, name: buscar},
			success: function (data){
				$("#tabla_carreras").html(data);
			}
		});
	}
}
