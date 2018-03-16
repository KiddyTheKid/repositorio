<?php
include "../../concentrador.php";

$usuario = new Usuarios();
$usuario->cedula = $_POST['cedula'];
$usuario->nombres = $_POST['nombres'];
$usuario->apellidos = $_POST['apellidos'];
$usuario->correo = $_POST['correo'];
$usuario->direccion = $_POST['direccion'];
$usuario->telefono = $_POST['telefono'];

if (Usuarios::editar($usuario))
{
	Cartero::crearMensaje(1, "Exito", "Editado con exito!");
} else {
	Cartero::crearMensaje(2, "Error", "Ocurrio un problema!");
}
