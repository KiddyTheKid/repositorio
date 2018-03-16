<?php
include "../core/php/concentrador.php";
include "Modals/edit_especialidad.php";
include "Modals/crear_especialidad.php";
?>
<div class="container-fluid">
    <h3>Especialidad</h3>
    <div class="form-group">
    	<form id="addtdocForm">
    		<input type="button" value="+ Crear" data-toggle="modal"
    		class="btn btn-default" data-target="#carrera_creador">
    		<input type="button" value="Buscar" 
    		class="btn btn-default" onclick="Carrera.getTabla(0)">
    		<br><br>
    		<input type="text" id="searcher" name="searcher"
    		placeholder="Buscar la especialidad" onkeyup="Carrera.getTabla(0)" 
    		class="form-control">    		
    	</form>
    </div>
    <table class="table" id="tabla_carreras">
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
