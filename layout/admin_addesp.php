<?php
include "../core/php/concentrador.php";
include "Modals/edit_autor.php";
include "Modals/crear_autor.php";
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				Autores
			</h3>
			<button type="button " data-toggle="modal" 
				data-target="#autor_creador" class="btn btn-default">
				+ Crear
			</button>
			<button type="button " class="btn btn-default" onclick="traerAutores(0)">
				Buscar
			</button>
			<br><br>
			<input type="text" id="searcher" placeholder="Buscar por Nombre, Apellido o Cedula"
				class="form-control" onkeyup="traerAutores(0)">
			<div id="tabla_autores">
				<table class="table">
					<thead>
						<tr>
							<th>Cedula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Telefono</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
