<?php
include "../../concentrador.php";

$doc = new Documentos();
$doc->id = $_POST['id'];
$doc->autor = (isset($_POST['ced_autor'])
	&& $_POST['ced_autor'] != "")? $_POST['ced_autor']:exit();
$doc->tipo_doc = $_POST['select_combo_documentos'];
$doc->especialidad = $_POST['select_combo_carreras'];
$doc->etiquetas = $_POST['etiquetas'];
$doc->tema = $_POST['tema'];

$autor = Autores::buscarPorCedula($doc->autor);

$nTema = preg_replace('!\s+!', ', ', $doc->tema);
$nombreAutor = preg_replace('!\s+!', ', ',
    "$autor->nombres $autor->apellidos");

$prep = $nombreAutor.", ".$nTema . ", " . $doc->etiquetas;
$nEtiquetas = preg_replace('!\s+!', ' ', $prep);
$metaArreglo = explode(",", $nEtiquetas);
$metaData = convertirSinMeta($metaArreglo);
$doc->etiquetas = $metaData;
$doc->metaetiquetas = $metaData;
$doc->ruta = (isset($_FILES['archivo'])) ?
Archivos::guardar($_FILES['archivo'], $doc) : "";

Documentos::editar($doc);

function convertirSinMeta($data){
    $respuesta = array();
    foreach ($data as $datum){
        $respuesta[] = $datum;
    }
    return join(" ", $respuesta);
}
