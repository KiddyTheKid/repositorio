<?php
include "../core/php/concentrador.php";
include "Modals/edit_tdocumento.php";
include "Modals/crear_tdocumento.php";
?>
<div class="container-fluid">
    <h3>Tipo de documento</h3>
    <div class="form-group">
    	<form id="addtdocForm">
    		<input type="button" value="+ Crear" data-toggle="modal"
    		class="btn btn-default" data-target="#tdocumento_creador">
    		<input type="button" value="Buscar" 
    		class="btn btn-default" onclick="TDocumento.getTabla(0)">
    		<br><br>
    		<input type="text" id="searcher" name="searcher"
    		placeholder="Buscar el tipo de documento" onkeyup="TDocumento.getTabla(0)" 
    		class="form-control">    		
    	</form>
    </div>
    <table class="table" id="tabla_TDocumentos">
    	<thead>
    		<tr>
    		<th>Id</th>
    		<th>Descripcion</th>
    		<th>Acción</th>
    		</tr>
    	</thead>
    	<tbody>
    	</tbody>
    </table>
</div>
