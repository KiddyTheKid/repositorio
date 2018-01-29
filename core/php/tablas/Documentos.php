<?php
class Documentos{
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
    public static function buscarDocumento($sDoc)
    {
        $params = "";
        $params .= Parametros::agregarParametro($sDoc->especialidad,
        "doc.especialidad");
        $params .= Parametros::agregarParametro($sDoc->tipo_doc,
        "doc.tipo_doc");
        $params .= Parametros::agregarParametro($sDoc->fecha_subida,
        "doc.fecha_subida");

        $sql = "SELECT
        concat(aut.nombres, ' ', aut.apellidos),
        doc.tema, doc.fecha_subida, doc.ruta
        FROM documentos as doc
        INNER JOIN autores as aut
        ON doc.autor = aut.cedula
        WHERE MATCH (doc.tema, doc.etiquetas)
        AGAINST ('$sDoc->tema' IN NATURAL LANGUAGE MODE)
        $params";

        $resultado = Database::Execute($sql);
        while ($row = $resultado->fetch_row()){
            $doc = new Documentos();
            $doc->autor = $row[0];
            $doc->tema = $row[1];
            $doc->fecha_subida = $row[2];
            $doc->ruta = $row[3];
            Cartero::crearTarjeta($doc);
        }
    }
    public static function guardar($doc){
        $sql = "INSERT INTO
        documentos (tema, autor, tipo_doc, especialidad, fecha_subida,
        etiquetas, metaetiquetas, ruta)
        VALUES ('$doc->tema', '$doc->autor',
            $doc->tipo_doc, $doc->especialidad, NOW(),
            '$doc->etiquetas', '$doc->metaetiquetas', '$doc->ruta')";
        if (Database::Execute($sql)){
            Cartero::crearMensaje(1, "Exito!", "Documento listo");
        } else {
            Cartero::crearMensaje(2, "Problema", "No se pudo completar
            la acción");
        }

    }
}
