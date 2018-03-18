<?php
include "../core/php/concentrador.php";
?>
<div class="container">
    <div class="row">
        <h1>Bienvenido al panel administador</h1>
    </div>
    <br>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="jumbotron">
				<h2>
					Administrar Documentos
				</h2>
				<p>
					Subida trabajos y edite o elimine los registros que guarde.
				</p>
				<p>
					<a class="btn btn-primary btn-large" 
					href="javascript:admin('admin_doc.php')">Ir Ahora</a>
				</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="jumbotron">
				<h2>
					Administrar Autores
				</h2>
				<p>
					Crear Autores, editarlos o eliminar desde la tabla.
					<br>
				</p>
				<p>
					<a class="btn btn-primary btn-large" 
					href="javascript:admin('admin_aut.php')">Ir Ahora</a>
				</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="jumbotron">
				<h2>
					Administrar Usuarios
				</h2>
				<p>
					Cree, elimine o edite usuarios de la plataforma.
				</p>
				<p>
					<a class="btn btn-primary btn-large" 
					href="javascript:admin('admin_usrs.php')">Ir Ahora</a>
				</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="jumbotron">
				<h2>
					Administrar Carreras
				</h2>
				<p>
					Agregue, elimine o edite carreras para etiquetar correctamente 
					los documentos cargados.
				</p>
				<p>
					<a class="btn btn-primary btn-large" 
					href="javascript:admin('admin_addesp.php')">Ir Ahora</a>
				</p>
			</div>
		</div>
		<div class="col-md-6">
			<div class="jumbotron">
				<h2>
					Administrar los tipos documentos
				</h2>
				<p>
					Agregue, edite o elimine los tipos de documentos con los que trabajara.
				</p>
				<p>
					<a class="btn btn-primary btn-large" 
					href="javascript:admin('admin_addtdoc.php')">Ir Ahora</a>
				</p>
			</div>
		</div>
	</div>
</div>
</div>
