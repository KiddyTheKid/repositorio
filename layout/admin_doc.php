<?php
include "../core/php/concentrador.php";
?>
<div class="container">
    <h4>Subir un documento</h4>
    <br>
    <form id="admin_doc_sub">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="col-form-label">
                        <label>Tipo de trabajo</label>
                    </div>
                    <select class="custom-select"
                    name="select_combo_documentos"
                    id="select_combo_documentos">
                    <?php
                    Combos::cargarTiposDocs();
                    ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="col-form-label">
                        <label>Especialidad</label>
                    </div>
                    <select class="custom-select"
                    name="select_combo_carreras"
                    id="select_combo_carreras">
                    <?php
                    Combos::cargarCarreras();
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
            <?php
            Combos::cargarAutores();
            ?>
        </div>
        <div class="form-group">
            <div class="col-form-label">
                <label>Etiquetas</label>
            </div>
            <input type="text" name="etiquetas" id="etiquetas" placeholder="Inserte las etiquetas separadas por una coma" class="form-control">
        </div>
        <div class="form-group">
            <div class="col-form-label">
                <label for="archivo">Archivo</label>
            </div>
            <input id="archivo" name="archivo" type="file" class="form-control">
        </div>
        <div class="form-group">
            <input type="button" onclick="ExecFile(1,'admin_doc_sub','archivo');" class="btn btn-outline-dark btn-light" value="Subir Archivo">
        </div>
    </form>
</div>
