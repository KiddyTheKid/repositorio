<?php
class TiposDocumentos{
	public function __construct()
	{
		$this->id = null;
		$this->descripcion = null;
	}
	public static function guardar($tDoc)
	{
		$sql = "INSERT INTO tipos_documentos
		(descripcion) VALUES ('$tDoc->descripcion')";
		if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito", "Se creo correctamente");
		} else {
			Cartero::crearMensaje(2, "Error", "Intente nuevamente");
		}
	}
	public static function mostrarTodo()
	{
		$sql = "SELECT * FROM tipos_documentos";
		$resp = Database::Execute($sql);
		$tabla = new TablasHTML();
		$tabla->id = "tablaTipoDocumentos";
		$tabla->cabecera = $resp->fetch_fields();
		$tabla->contenido = $resp;
		TablasHTML::crearTabla($tabla);
	}
	public static function buscarTodo()
	{
		$sql = "SELECT * FROM tipos_documentos";
		$data = array();
		$resp = Database::Execute($sql);
		while ($row = $resp->fetch_row())
		{
			$tDoc = new TiposDocumentos();
			$tDoc->id = $row[0];
			$tDoc->descripcion = $row[1];
			$data[] = $tDoc;
		}
		return $data;
	}
	public static function buscarPodId($id)
	{
		$sql = "SELECT * FROM tipos_documentos WHERE id = $id";
		$data = Database::Execute($sql)->fetch_row();
		$tipoDoc = new TiposDocumentos();
		$tipoDoc->id = $data[0];
		$tipoDoc->descripcion = $data[1];
		return $tipoDoc;
	}
	public static function buscarPorDescripcion($busqueda)
	{
		$sql = "SELECT * FROM tipos_documentos
		WHERE descripcion LIKE '%$busqueda%'";
		$resp = Database::Execute($sql);
		$tiposDocs = array();
		while ($row = $resp->fetch_row())
		{
			$tDoc = new TiposDocumentos();
			$tDoc->id = $row[0];
			$tDoc->descripcion = $row[1];
			$tiposDocs[] = $tDoc;
		}
		return $tiposDocs;
	}
	public static function borrar($tDoc)
	{
		$sql = "DELETE FROM tipos_documentos WHERE id = $tDoc->id";
		if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito!", "Fue eliminado el registro");
		} else {
			Cartero::crearMensaje(2, "Error", "Vuelva a intentarlo");
		}
	}
}
