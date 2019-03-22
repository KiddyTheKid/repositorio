<?php
class Documentos{
	private static $tabla = "documentos";
    public function __construct()
    {
        $this->id = null;
        $this->autor = null;
        $this->tipo_doc = null;
        $this->especialidad = null;
        $this->fecha_subida = null;
        $this->etiquetas = null;
        $this->metaetiquetas = null;
        $this->tema = null;
        $this->ruta = null;
    }

    /**
     * Buscar documentos de cualquier forma
     * @param Documentos $sDoc
     */
    public static function buscarDocumento($sDoc) {
        $sql = "CALL buscar_documento('%s', %s, %s, %s);";
        $sql = sprintf($sql, $sDoc->tema,
            $sDoc->especialidad == null ? "NULL" : $sDoc->especialidad,
                $sDoc->tipo_doc == null ? "NULL" : $sDoc->tipo_doc,
                $sDoc->fecha_subida == null ? "NULL" : $sDoc->fecha_subida);
        $resultado = Database::Execute($sql);
        $resps = [];
        while ($row = $resultado->fetch_row())
        {
            $doc = new Documentos();
            $doc->autor = utf8_encode($row[0]);
            $doc->tema = utf8_encode($row[1]);
            $doc->fecha_subida = $row[2];
            $doc->ruta = utf8_encode($row[3]);
            $doc->tipo_doc = $row[4];
            $doc->especialidad = $row[5];
            $resps[] = $doc;
            //Cartero::crearTarjeta($doc);
        }
        header('Content-type: application/json');
        echo  json_encode($resps);
    }
    public static function buscarPorId($id)
    {
    	$id = Database::Sanar($id);
    	$sql = "SELECT * FROM ".self::$tabla." WHERE id = $id";
    	$resp = Database::Execute($sql);
    	return self::documentoCatcher($resp->fetch_assoc());
    }
    public static function buscarEnPagina($pagina, $dato)
    {
    	if ($dato != "")
    	{
    		$val = $dato;
    		$dato ="WHERE MATCH (tema, etiquetas) 
    			AGAINST ('$val' IN NATURAL LANGUAGE MODE)";
    		
    	}
    	$pagina = Database::Sanar($pagina);
    	$sql = "SELECT * FROM ".self::$tabla." $dato LIMIT $pagina, 30";
    	$resp = Database::Execute($sql);
    	$documentos = array();
    	while ($row = $resp->fetch_assoc())
    	{
    		$documentos[] = self::documentoCatcher($row); 
    	}
    	return $documentos;
    }
    public static function crear($doc){
    	$a = Database::Sanar($doc->tema);
    	$b = Database::Sanar($doc->autor);
    	$c = Database::Sanar($doc->tipo_doc);
    	$d = Database::Sanar($doc->especialidad);
    	$e = Database::Sanar($doc->etiquetas);
    	$f = Database::Sanar($doc->metaetiquetas);
    	$g = Database::Sanar($doc->ruta);
        $sql = "INSERT INTO
        documentos (tema, autor, tipo_doc, especialidad, fecha_subida,
        etiquetas, metaetiquetas, ruta)
        VALUES ('$a', '$b', $c, $d, NOW(), '$e', '$f', '$g')";
        if (Database::Execute($sql)){
            Cartero::crearMensaje(1, "Exito!", "Documento listo");
        } else {
            Cartero::crearMensaje(2, "Problema", "No se pudo completar
            la acción");
        }

    }
    public static function editar($doc){
    	$id = Database::Sanar($doc->id);
    	$a = Database::Sanar($doc->tema);
    	$b = Database::Sanar($doc->autor);
    	$c = Database::Sanar($doc->tipo_doc);
    	$d = Database::Sanar($doc->especialidad);
    	$e = Database::Sanar($doc->etiquetas);
    	$f = Database::Sanar($doc->metaetiquetas);
    	$g = Database::Sanar($doc->ruta);
    	$g = $g != "" ? ", ruta = '$g'" : "";
        $sql = "UPDATE ".self::$tabla." SET
        tema = '$a', autor = '$b', tipo_doc = $c, especialidad = $d,
        etiquetas = '$e', metaetiquetas = '$f' $g WHERE id = $id";
        if (Database::Execute($sql)){
            Cartero::crearMensaje(1, "Exito!", "Documento editado");
        } else {
            Cartero::crearMensaje(2, "Problema", "No se pudo completar
            la acción");
        }

    }
    public static function borrar($id)
    {
    	$id = Database::Sanar($id->id);
    	$sql = "DELETE FROM ".self::$tabla." WHERE id = $id";
    	if (Database::Execute($sql))
		{
			Cartero::crearMensaje(1, "Exito!", "Fue eliminado el registro");
		} else {
			Cartero::crearMensaje(2, "Error", "Vuelva a intentarlo");
		}
    }
    private static function documentoCatcher($row)
    {
    	extract($row);
    	$doc = new Documentos();
    	$doc->id = $id;
        $doc->autor = Autores::buscarPorCedula($autor);
        $doc->tipo_doc = TiposDocumentos::buscarPorId($tipo_doc);
        $doc->especialidad = Carreras::buscarPorId($especialidad);
        $doc->fecha_subida = $fecha_subida;
        $doc->etiquetas = $etiquetas;
        $doc->metaetiquetas = $metaetiquetas;
        $doc->tema = $tema;
        $doc->ruta = $ruta;
        return $doc;
    }
}
