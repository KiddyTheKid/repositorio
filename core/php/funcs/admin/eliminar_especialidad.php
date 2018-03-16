<?php
include "../../concentrador.php";

$carrera = new Carreras();
$carrera->id = $_POST['ide'];
Carreras::borrar($carrera);
