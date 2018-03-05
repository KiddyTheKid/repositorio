<?php
include "../core/php/concentrador.php";
?>
<div class="container">
    <h4>Tipo de documento</h4>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<form id="addtdocForm">
    				<input type="text" id="tDoc" name="tDoc"
    				placeholder="Agregar nuevo tipo de documentos" 
    				class="form-control">
    				<br>
    				<input type="button" value="Agregar" 
    				class="btn btn-dark" onclick="Exec(5,'addtdocForm')">
    			</form>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<table class="table" id="tablaTipoDocumentos">
    			<thead>
    				<tr>
    					<th>Id</th>
    					<th>Descripcion</th>
    					<th>Acción</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php
    				$tDocumentos = TiposDocumentos::buscarTodo();
    				foreach ($tDocumentos as $tDoc)
    				{
    					echo "<tr>";
    					echo "<td>$tDoc->id</td>";
    					echo "<td>$tDoc->descripcion</td>";
    					echo "<td></td>";
    					echo "</tr>";
    				}
    				?>
    			</tbody>
    		</table>
    	</div>
    </div>
</div>
