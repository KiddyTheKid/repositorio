<?php
include "../../concentrador.php";

$tDoc = TiposDocumentos::buscarPorId($_POST['id']);

echo json_encode($tDoc);
