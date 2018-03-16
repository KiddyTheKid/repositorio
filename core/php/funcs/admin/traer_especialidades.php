<?php
include "../../concentrador.php";

$carreras = Carreras::buscarEnPagina($_POST['pg'], $_POST['name']);
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Descripcion</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($carreras as $carrera)
{
	echo "<tr>";
	echo "<td>$carrera->id</td>";
	echo "<td>$carrera->descripcion</td>";
	echo "<td>";
	echo "<button class=\"btn btn-primary\" data-toggle='modal' ";
	echo "onclick='Carrera.get($carrera->id)' data-target='#carrera_editor'>";
	echo "Editar";
	echo "</button>";
	echo "<button class=\"btn btn-danger\" onclick='Carrera.borrar($carrera->id)'>";
	echo "Eliminar";
	echo "</button>";
	echo "</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-default' onclick='carrera.getTabla(\"-\")'>Anterior</button>";
echo "<button class='btn btn-default' onclick='carrera.getTabla(\"+\")'>Siguiente</button>";

