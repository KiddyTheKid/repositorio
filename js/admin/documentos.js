let Dpg = 0;
class Documento{
	constructor(){
		this.id = null;
		this.autor = null;
		this.tipo_doc = null;
		this.especialidad = null;
		this.fecha_subida = null;
		this.etiquetas = null;
		this.metaetiquetas = null;
		this.tema = null;
		this.ruta = null;
	}
	static get(i){
		$.ajax({
			type: 'POST',
			url : 'core/php/funcs/admin/search_documento.php',
			data: {id:i},
			success: function (data){
				let doc = JSON.parse(data);
				$("#id").val(doc.id);
				$("#select_combo_documentos").val(doc.tipo_doc.id);
				$("#select_combo_carreras").val(doc.especialidad.id);
				$("#tema").val(doc.tema);
				$("#ced_autor").val(doc.autor.cedula);
				$("#etiquetas").val(doc.etiquetas);
			}
		});
	}
	static crear(){
		let form = $("#create_documento_form");
		let file = $("#archivoC")[0].files;
		if (file.length === 0){
			alert("No hay archivo para subir");
		} else {
			let formData = new FormData();
			formData.append("archivo", file[0]);
			$.each(form.serializeArray(), function (key, input){
				formData.append(input.name, input.value);
			});
			$.ajax({
				type: 'POST',
				url: 'core/php/funcs/admin/crear_documento.php',
				data: formData,
				contentType: false,
				processData: false,
				success: function (data){
					Documento.getTabla(0);
					form[0].reset();
					$("#archivoC").val("");
					$("#mensajes").html(data);
				}
			});
		}
		
	}
	static editar(){
		let form = $("#edit_documento_form");
		let file = $("#archivoE")[0].files;
		let formData = new FormData();
		formData.append("archivo", file[0]);
		$.each(form.serializeArray(), function (key, input){
			formData.append(input.name, input.value);
		});
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/editar_documento.php',
			data: formData,
			contentType: false,
			processData: false,
			success: function (data){
				Documento.getTabla(0);
				form[0].reset();
				$("#archivoE").val("");
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
			url: 'core/php/funcs/admin/eliminar_documento.php',
			data: {ide:i},
			success: function (data){
				Documento.getTabla(0);
				$("#mensajes").html(data);
			}
		});
	}
	static getTabla(n){
		switch (n){
			case "+":
				Dpg += 10;
				break;
			case "-":
				if (Dpg != 0){
					Dpg -= 10;
				}
				break;
		}
		let buscar = $("#searcher").val();
		$.ajax({
			type: 'POST',
			url: 'core/php/funcs/admin/traer_documentos.php',
			data: {pg:Dpg, name: buscar},
			success: function (data){
				$("#tabla_documentos").html(data);
			}
		});
	}
}
