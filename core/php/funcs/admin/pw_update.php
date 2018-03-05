<?php
session_start();
include "../../concentrador.php";

$pw_anterior = $_POST['pw_anterior'];
$pw_nueva = $_POST['pw_nuevo'];
$pw_confirm = $_POST['pw_confirm'];

$usuario = unserialize($_SESSION['usuario_actual']);

if (md5($pw_anterior) != $usuario->password)
{
	Cartero::crearMensaje(2, "Error", "La contraseña anterior no es la misma");
	exit();
}

if ($pw_nueva != $pw_confirm)
{
	Cartero::crearMensaje(2, "Error", "Las contraseñas no coinciden");
	exit();
}

$usuario->password = md5($pw_nueva);
if (Usuarios::actualizarPass($usuario))
{
	Cartero::crearMensaje(1, "Exito!", "Contraseña Actualizada");
	$usuario->password = md5($pw_nueva);
	$_SESSION['usuario_actual'] = serialize($usuario);
} else {
	Cartero::crearMensaje(0, "Error", "Ocurrio un problema");
}
