<?php
include "../../concentrador.php";

$documentos = Documentos::buscarEnPagina($_POST['pg'], $_POST['name']);
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Tema</th>';
echo '<th>Autor</th>';
echo '<th>Carrera</th>';
echo '<th>Trabajo</th>';
echo '<th>Acción</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($documentos as $documento)
{
	echo "<tr>";
	echo "<td>$documento->id</td>";
	echo "<td>$documento->tema</td>";
	echo "<td>".$documento->autor->nombres." ".$documento->autor->apellidos."</td>";
	echo "<td>".$documento->especialidad->descripcion."</td>";
	echo "<td>".$documento->tipo_doc->descripcion."</td>";
	echo "<td>";
	echo "<button class=\"btn btn-primary\" data-toggle='modal' ";
	echo "onclick='Documento.get($documento->id)' data-target='#documento_editor'>";
	echo "Editar";
	echo "</button>";
	echo "<button class=\"btn btn-danger\" onclick='Documento.borrar($documento->id)'>";
	echo "Eliminar";
	echo "</button>";
	echo "</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<button class='btn btn-default' onclick='Documento.getTabla(\"-\")'>Anterior</button>";
echo "<button class='btn btn-default' onclick='Documento.getTabla(\"+\")'>Siguiente</button>";

