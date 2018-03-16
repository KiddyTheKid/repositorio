<?php
include "../core/php/concentrador.php";
include "Modals/edit_usuario.php";
include "Modals/crear_usuario.php";
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				Usuarios
			</h3>
			<button type="button " data-toggle="modal" 
				data-target="#usuario_creador" class="btn btn-default">
				+ Crear
			</button>
			<button type="button " class="btn btn-default" onclick="Usuario.getTabla(0)">
				Buscar
			</button>
			<br><br>
			<input type="text" id="searcher" placeholder="Buscar por Nombre, Apellido o Cedula"
				class="form-control" onkeyup="Usuario.getTabla(0)">
			<div id="tabla_usuarios">
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
