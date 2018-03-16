<?php
include "../../concentrador.php";

$tipoDoc = new TiposDocumentos();
$tipoDoc->descripcion = $_POST['descripcion'];
TiposDocumentos::guardar($tipoDoc);
