<?php
include "../../concentrador.php";

$tDocumentos = TiposDocumentos::buscarEnPagina($_POST['pg'], $_POST['name']);
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Descripcion</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($tDocumentos as $tDocumento)
{
	echo "<tr>";
	echo "<td>$tDocumento->id</td>";
	echo "<td>$tDocumento->descripcion</td>";
	echo "<td>";
	echo "<button class=\"btn btn-primary\" data-toggle='modal' ";
	echo "onclick='TDocumento.get($tDocumento->id)' data-target='#tdocumento_editor'>";
	echo "Editar";
	echo "</button>";
	echo "<button class=\"btn btn-danger\" onclick='TDocumento.borrar($tDocumento->id)'>";
	echo "Eliminar";
	echo "</button>";
	echo "</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-default' onclick='TDocumento.getTabla(\"-\")'>Anterior</button>";
echo "<button class='btn btn-default' onclick='TDocumento.getTabla(\"+\")'>Siguiente</button>";

