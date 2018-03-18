<?php
include "../../concentrador.php";

$documento = Documentos::buscarPorId($_POST['id']);

echo json_encode($documento);
