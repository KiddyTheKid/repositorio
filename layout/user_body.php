<section class="seccion-imagen">
	<img src="im/logo.png" height="120" style="max-width: 100%">
</section>
<section id="busquedaAvanzada" class="seccion-busqueda" style="display: none">
    <div class="row">
    	<div class="col">
    		<input type="text" name="busqueda" class="form-control" placeholder="Busqueda...">
        </div>
    </div>
	<div class="row">
        <div class="col">
        	<select class="custom-select" name="carrera" id="carrera">
        		<option value="0">Carrera...</option>
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
		<div class="col">
			<select class="custom-select" name="tipo_doc" id="tipo_doc">
				<option value="0">Tipo de documento</option>
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
		<div class="col">
			<input type="date" class="form-control" name="fecha" id="fecha" value="">
        </div>
        <div class="col">
        	<button class="btn btn-secondary" type="button" onclick="busquedaAvanzada()">Busqueda avanzada</button>
        </div>
	</div>
    <div class="row">
    	<a href="#" name="toggle-busqueda">Volver a busqueda Normal</a>
	</div>
</section>
</div>
<section id="busquedaNormal" class="seccion-busqueda">
	<div class="row">
    	<div class="input-group">
    		<input type="text" name="busqueda" class="form-control" placeholder="Busqueda...">
            <span class="input-group-btn">
            	<button class="btn btn-secondary" type="button" onclick="realizarBusqueda()">Buscar</button>
            </span>
        </div>
    </div>
    <div class="row">
    	<a href="#" name="toggle-busqueda">Cambiar a modo avanzado</a>
    </div>
</section>
<section id="resultado_busqueda" class="seccion-resultados">
</section>


