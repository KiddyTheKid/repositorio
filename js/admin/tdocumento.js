let tDpg = 0;
class TDocumento{
	constructor(){
		this.id = null;
		this.descripcion;
	}
	static get(i){
		$.ajax({
			type: 'POST',
			url : 'core/php/funcs/admin/search_tdoc.php',
			data: {id:i},
			success: function (data){
				let doc = JSON.parse(data);
				$("#id").val(doc.id);
				$("#descripcion").val(doc.descripcion);
			}
		});
	}
	static crear(){
		let form = $("#create_tdocumento_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/crear_tdoc.php',
			data: form.serialize(),
			success: function (data){
				TDocumento.getTabla(0);
				form[0].reset();
				$("#mensajes").html(data);
			}
		});
	}
	static editar(){
		let form = $("#edit_tdocumento_form");
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/editar_tdoc.php',
			data: form.serialize(),
			success: function (data){
				TDocumento.getTabla(0);
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
			url: 'core/php/funcs/admin/eliminar_tdoc.php',
			data: {ide:i},
			success: function (data){
				TDocumento.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static getTabla(n){
		switch (n){
			case "+":
				tDpg += 10;
				break;
			case "-":
				if (tDpg != 0){
					tDpg -= 10;
				}
				break;
		}
		let buscar = $("#searcher").val();
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/traer_tdocs.php',
			data: {pg:tDpg, name: buscar},
			success: function (data){
				$("#tabla_TDocumentos").html(data);
			}
		});
	}
}
