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
        $preparar = preg_replace('!\s+!', ' ', $sDoc->tema);
        $qEx = explode(" ", $preparar);
        $newQex = array();
        foreach ($qEx as $ex){
            if ($ex != ""){
                $newQex[] = trim($ex);
            }
        }

        $params = "";
        $params .= Parametros::agregarParametro($sDoc->especialidad,
        "doc.especialidad");
        $params .= Parametros::agregarParametro($sDoc->tipo_doc,
        "doc.tipo_doc");
        $params .= Parametros::agregarParametro($sDoc->fecha_subida,
        "doc.fecha_subida");

        $busqueda = join("%' OR metaetiquetas LIKE '%", $newQex);
        $sql = "SELECT
        concat(aut.nombres, ' ', aut.apellidos),
        doc.tema, doc.fecha_subida
        FROM documentos as doc
        INNER JOIN autores as aut
        ON doc.autor = aut.cedula
        WHERE metaetiquetas LIKE '%$busqueda%'
        $params";
        $resultado = Database::Execute($sql);
        while ($row = $resultado->fetch_row()){
            $doc = new Documentos();
            $doc->autor = $row[0];
            $doc->tema = $row[1];
            $doc->fecha_subida = $row[2];
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
