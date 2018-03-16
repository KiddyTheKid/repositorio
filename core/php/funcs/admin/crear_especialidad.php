<?php
include "../../concentrador.php";

$carrera = new Carreras();
$carrera->descripcion = $_POST['descripcion'];
Carreras::guardar($carrera);
