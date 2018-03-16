<?php
include "../../concentrador.php";

$tipoDoc = new TiposDocumentos();
$tipoDoc->id = $_POST['ide'];
TiposDocumentos::borrar($tipoDoc);
