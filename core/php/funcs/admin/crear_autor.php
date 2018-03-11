<?php
include "../../concentrador.php";

$autor = new Autores();
$autor->cedula = $_POST['cedula'];
$autor->nombres = $_POST['nombres'];
$autor->apellidos = $_POST['apellidos'];
$autor->correo = $_POST['correo'];
$autor->telefono = $_POST['telefono'];
$autor->direccion = $_POST['direccion'];
if (empty($autor->cedula) || empty($autor->nombres) || empty($autor->apellidos) || empty($autor->correo))
{
	Cartero::crearMensaje(2, "Error", "Campos importantes vacios");
	exit();
}

if (Autores::crear($autor))
{
	Cartero::crearMensaje(1, "Exito!", "Autor creado!");
} else {
	Cartero::crearMensaje(0, "Error", "Ocurrio un problema");
}
