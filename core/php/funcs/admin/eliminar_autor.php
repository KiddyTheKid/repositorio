<?php
include "../../concentrador.php";

if (Autores::eliminar($_POST['ide']))
{
	Cartero::crearMensaje(1, "Exito", "Eliminado");	
} else {
	Cartero::crearMensaje(2, "Error", "Ocurrio un error no grave");
}
