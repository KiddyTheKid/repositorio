<?php
include "../../concentrador.php";

$autor = new Autores();
$autor->cedula = $_POST['cedula'];
$autor->nombres = $_POST['nombres'];
$autor->apellidos = $_POST['apellidos'];
$autor->correo = $_POST['correo'];
$autor->direccion = $_POST['direccion'];
$autor->telefono = $_POST['telefono'];

if (Autores::editar($autor))
{
	Cartero::crearMensaje(1, "Exito", "Editado con exito!");
} else {
	Cartero::crearMensaje(2, "Error", "Ocurrio un problema!");
}
