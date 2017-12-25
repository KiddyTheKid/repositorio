<?php
$ruta = dirname(dirname(__FILE__));
include "$ruta/core/php/funcs/usr_opciones.php";
?>
<br>
<div id="busquedaAvanzada" class="container-fluid" style="display: none">
    <div class="jumbotron">
        <div class="row justify-content-center">
            <img src="im/logo.png" height="120" style="max-width: 100%">
        </div>
        <br>
        <form id="user_body_search_advance" action="javascript:busquedaAvanzada()">
            <div class="input-group">
                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Busqueda...">
                <span class="input-group-addon">
                    <select class="custom-select" name="carrera" id="carrera">
                        <option value="0">Carrera...</option>
                        <?php
                        cargarCarreras();
                        ?>
                    </select>
                </span>
                <span class="input-group-addon">
                    <select class="custom-select" name="tipo_doc" id="tipo_doc">
                        <option value="0">Tipo de documento</option>
                        <?php
                        cargarTiposDocs();
                        ?>
                    </select>
                </span>
                <span class="input-group-addon">
                    <input type="month" class="form-control" name="fecha" id="fecha">
                </span>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" onclick="busquedaAvanzada()">Busqueda avanzada</button>
                </span>
                <div class="row">
                    <div class="col">

                    </div>
                </div>
            </div>
        </form>
        <a href="javascript:toggleBusquedas()">Volver a busqueda Normal</a>
    </div>
</div>
<div id="busquedaNormal" class="container-fluid">
    <div class="jumbotron">
        <div class="row justify-content-center">
            <img src="im/logo.png" height="120" style="max-width: 100%">
        </div>
        <br>
        <form id="user_body_search" action="javascript:realizarBusqueda()">
            <div class="input-group">
                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Busqueda...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" onclick="realizarBusqueda()">Buscar</button>
                </span>
            </div>
        </form>
        <a href="javascript:toggleBusquedas()">Cambiar a modo avanzado</a>
    </div>
</div>
<div id="resultado_busqueda" class="container-fluid"></div>
<br>