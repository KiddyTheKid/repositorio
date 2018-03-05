<?php
include "../../concentrador.php";

$usr = new Usuarios();
$usr->cedula = $_POST['cedula'];
$usr->nombres = $_POST['nombres'];
$usr->apellidos = $_POST['apellidos'];
$usr->correo = $_POST['email'];
$usr->direccion = $_POST['direccion'];
$usr->telefono = $_POST['telf'];
$usr->password = md5($usr->cedula);
$usr->nivel = 0;

if (empty($usr->cedula) || empty($usr->nombres) || empty($usr->apellidos))
{
	Cartero::crearMensaje(2, "Error", "No deben haber campos vacios");
	exit();
}

if (Usuarios::crear($usr)) 
{
	Cartero::crearMensaje(1, "Exito!", "Usuario creado");
}

