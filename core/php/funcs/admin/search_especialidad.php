<?php
include "../../concentrador.php";

$carrera = Carreras::buscarPorId($_POST['id']);

echo json_encode($carrera);
