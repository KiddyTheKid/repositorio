<?php
include "../core/php/concentrador.php";
include "Modals/edit_documento.php";
include "Modals/crear_documento.php";
?>
<div class="container-fluid">
    <h3>Documentos</h3>
    <div class="form-group">
    	<form id="addtdocForm">
    		<input type="button" value="+ Registrar" data-toggle="modal"
    		class="btn btn-default" data-target="#documento_creador">
    		<input type="button" value="Buscar" 
    		class="btn btn-default" onclick="Documento.getTabla(0)">
    		<br><br>
    		<input type="text" id="searcher" name="searcher"
    		placeholder="Buscar por nombre, cedula de autor o nombre de autor" 
    		onkeyup="Documento.getTabla(0)" class="form-control">    		
    	</form>
    </div>
    <table class="table" id="tabla_documentos">
    	<thead>
    		<tr>
    		<th>Id</th>
    		<th>Tema</th>
    		<th>Autor</th>
    		<th>Carrera</th>
    		<th>Trabajo</th>
    		<th>Acción</th>
    		</tr>
    	</thead>
    	<tbody>
    	</tbody>
    </table>
</div>
