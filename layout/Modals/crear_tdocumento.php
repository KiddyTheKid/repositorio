<!-- Editar -->
<div class="modal fade" id="tdocumento_creador" tabindex="-1" role="dialog" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Tipo Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="create_tdocumento_form">
      		<div class="form-group">
      			<label for="descripcion">
      			Descripcion
      			</label>
      			<input type="text" id="descripcion" name="descripcion" class="form-control">
      		</div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        	data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" 
        	data-dismiss="modal" onclick="TDocumento.crear()">Crear</button>
      </div>
    </div>
  </div>
</div>
