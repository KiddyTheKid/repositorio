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
    		<?php
    		TiposDocumentos::mostrarTodo();
    		?>
    	</div>
    </div>
</div>
