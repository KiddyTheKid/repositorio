<?php
include "../../concentrador.php";

$tipoDoc = new TiposDocumentos();
$tipoDoc->id = $_POST['id'];
$tipoDoc->descripcion = $_POST['descripcion'];
TiposDocumentos::editar($tipoDoc);
