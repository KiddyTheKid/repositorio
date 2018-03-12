<?php
include "../../concentrador.php";

$usuarios = Usuarios::buscarEnPagina($_POST['pg'], $_POST['name']);
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Cedula</th>';
echo '<th>Nombres</th>';
echo '<th>Apellidos</th>';
echo '<th>Telefono</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($usuarios as $usuario)
{
	echo "<tr>";
	echo "<td>$usuario->cedula</td>";
	echo "<td>$usuario->nombres</td>";
	echo "<td>$usuario->apellidos</td>";
	echo "<td>$usuario->telefono</td>";
	echo "<td>";
	echo "<button class=\"btn btn-primary\" data-toggle='modal' ";
	echo "onclick='getUsuario($usuario->id)' data-target='#usuario_editor'>";
	echo "Editar";
	echo "</button>";
	echo "<button class=\"btn btn-danger\" onclick='delUsuario($usuario->id)'>";
	echo "Eliminar";
	echo "</button>";
	echo "</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-default' onclick='traerUsuarios(\"-\")'>Anterior</button>";
echo "<button class='btn btn-default' onclick='traerUsuarios(\"+\")'>Siguiente</button>";

