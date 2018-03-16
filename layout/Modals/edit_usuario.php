<!-- Editar -->
<div class="modal fade" id="usuario_editor" tabindex="-1" role="dialog" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="edit_usuario_form" base="admin_usrs.php" action="core/php/funcs/admin/editar_usuario.php">
      		<div class="form-group">
      			<label for="cedula">
      			Cédula
      			</label>
      			<input type="text" id="cedula" name="cedula" class="form-control" readonly>
      		</div>
      		<div class="form-group">
      			<label for="nombres">
      			Nombres
      			</label>
      			<input type="text" id="nombres" name="nombres" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="apellidos">
      			Apellidos
      			</label>
      			<input type="text" id="apellidos" name="apellidos" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="correo">
      			Correo
      			</label>
      			<input type="text" id="correo" name="correo" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="telefono">
      			Telefono
      			</label>
      			<input type="text" id="telefono" name="telefono" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="direccion">
      			Direccion
      			</label>
      			<input type="text" id="direccion" name="direccion" class="form-control">
      		</div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        	data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" 
        	data-dismiss="modal" onclick="Usuario.editar()">Guardar</button>
      </div>
    </div>
  </div>
</div>
