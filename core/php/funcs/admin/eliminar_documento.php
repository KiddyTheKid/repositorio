<?php
include "../../concentrador.php";

$documento = new Documentos();
$documento->id = $_POST['ide'];
Documentos::borrar($documento);
