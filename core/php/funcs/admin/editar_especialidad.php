<?php
include "../../concentrador.php";

$carrera = new Carreras();
$carrera->id = $_POST['id'];
$carrera->descripcion = $_POST['descripcion'];
Carreras::editar($carrera);
