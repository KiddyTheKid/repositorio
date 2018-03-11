<?php
include "../../concentrador.php";

$autores = Autores::buscarEnPagina($_POST['pg'], $_POST['name']);
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

foreach ($autores as $autor)
{
	echo "<tr>";
	echo "<td>$autor->cedula</td>";
	echo "<td>$autor->nombres</td>";
	echo "<td>$autor->apellidos</td>";
	echo "<td>$autor->telefono</td>";
	echo "<td>";
	echo "<button class=\"btn btn-primary\" data-toggle='modal' ";
	echo "onclick='getAutor($autor->id)' data-target='#autor_editor'>";
	echo "Editar";
	echo "</button>";
	echo "<button class=\"btn btn-danger\" onclick='delAutor($autor->id)'>";
	echo "Eliminar";
	echo "</button>";
	echo "</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-default' onclick='traerAutores(\"-\")'>Anterior</button>";
echo "<button class='btn btn-default' onclick='traerAutores(\"+\")'>Siguiente</button>";

