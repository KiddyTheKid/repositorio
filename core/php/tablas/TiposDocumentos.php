<?php
class TiposDocumentos{
	private static $tabla = "tipos_documentos";
	public function __construct()
	{
		$this->id = null;
		$this->descripcion = null;
	}
	public static function guardar($tDoc)
	{
		$tDoc->descripcion = Database::Sanar($tDoc->descripcion);
		$sql = "INSERT INTO ".self::$tabla."
		(descripcion) VALUES ('$tDoc->descripcion')";
		if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito", "Se creo correctamente");
		} else {
			Cartero::crearMensaje(2, "Error", "Intente nuevamente");
		}
	}
	public static function editar($tDoc)
	{
		$tDoc->id = Database::Sanar($tDoc->id);
		$tDoc->descripcion = Database::Sanar($tDoc->descripcion);
		$sql = "UPDATE ".self::$tabla." SET descripcion = '$tDoc->descripcion' 
		WHERE id = $tDoc->id";
		if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito", "Se editó correctamente");
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
	public static function buscarEnPagina($pagina, $dato)
    {
    	if ($dato != "")
    	{
    		$val = $dato;
    		$dato = "WHERE descripcion like '%$val%'";
    		
    	}
    	$pagina = Database::Sanar($pagina);
    	$sql = "SELECT * FROM ".self::$tabla." $dato LIMIT $pagina, 30";
    	$resp = Database::Execute($sql);
    	$tDocs = array();
    	while ($row = $resp->fetch_assoc())
    	{
    		$tDocs[] = self::tDocumentoCatcher($row); 
    	}
    	return $tDocs;
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
	public static function buscarPorId($id)
	{
		$id = Database::Sanar($id);
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
		$tDoc->id = Database::Sanar($tDoc->id);
		$sql = "DELETE FROM ".self::$tabla." WHERE id = $tDoc->id";
		if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito!", "Fue eliminado el registro");
		} else {
			Cartero::crearMensaje(2, "Error", "Vuelva a intentarlo");
		}
	}
	private static function tDocumentoCatcher($row)
	{
		extract($row);
		$tDoc = new TiposDocumentos();
		$tDoc->id = $id;
		$tDoc->descripcion = $descripcion;
		return $tDoc;
	}
}
