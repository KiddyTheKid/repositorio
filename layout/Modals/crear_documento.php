<!-- Editar -->
<div class="modal fade" id="documento_creador" tabindex="-1" role="dialog" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="create_documento_form">
      		<div class="row">
      			<div class="col">
      				<div class="form-group">
      					<div class="col-form-label">
      						<label>Tipo de trabajo</label>
      					</div>
      					<select class="custom-select" name="select_combo_documentos" 
      						id="select_combo_documentos">
      					<?php
      					$tDocs = TiposDocumentos::buscarTodo();
                    	foreach ($tDocs as $tDoc)
                    	{
                    		echo "<option value='$tDoc->id'>";
                    		echo "$tDoc->descripcion</option>";
                    	}
                    	?>
                    	</select>
                	</div>
            	</div>
            	<div class="col">
                	<div class="form-group">
                    	<div class="col-form-label">
                        	<label>Especialidad</label>
                    	</div>
                    	<select class="custom-select" name="select_combo_carreras"
                    		id="select_combo_carreras">
                    		<?php
                    		$carreras = Carreras::buscarTodo();
                    		foreach ($carreras as $carrera)
                    		{
                    			echo "<option value='$carrera->id'>";
                    			echo "$carrera->descripcion</option>";
                    		}
                    		?>
                    	</select>
					</div>
            	</div>
        	</div>
        	<div class="form-group">
        		<div class="col-form-label">
                	<label>Tema</label>
            	</div>
            	<input type="text" name="tema" id="tema"
            		placeholder="Tema del libro" class="form-control">
        	</div>
        	<div class="form-group">
            	<div class="col-form-label">
                	<label>Nombre del autor</label>
            	</div>
            	<input class="form-control" list="lista_autores" 
            		name="ced_autor" id="ced_autor">
            		<datalist id="lista_autores">
            		<?php
            		$autores = Autores::buscarTodo();
            		foreach ($autores as $autor)
            		{
            			echo "<option value='$autor->cedula' ";
            			echo "label='$autor->nombres $autor->apellidos'/>";
            		}
            		?>
            		</datalist>
        	</div>
        	<div class="form-group">
            	<div class="col-form-label">
                	<label>Etiquetas</label>
            	</div>
            	<input type="text" name="etiquetas" id="etiquetas" 
            		placeholder="Inserte las etiquetas separadas por una coma" 
            		class="form-control">
        	</div>
        </form>
        <div class="form-group">
            <div class="col-form-label">
            	<label for="archivo">Archivo</label>
            </div>
            <input id="archivoC" name="archivoC" type="file" class="form-control">
        </div>
	</div>
	<div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        	data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" 
        	data-dismiss="modal" onclick="Documento.crear()">Crear</button>
    </div>
	</div>
  </div>
</div>
