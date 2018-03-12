<?php
include "../../concentrador.php";

$usuario = Usuarios::buscarPorId($_POST['ide']);
echo json_encode($usuario);
