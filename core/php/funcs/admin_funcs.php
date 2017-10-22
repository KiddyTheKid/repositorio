<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 21/10/17
 * Time: 22:07
 */
include "../data/con.php";
switch ($_POST['accion']){
    case 1:
        insertar($con);
        break;
}
function Mensajero($nivel, $titulo, $mensaje){
    switch ($nivel){
        case 0:
            $estado = "danger";
            break;
        case 1:
            $estado = "success";
            break;
    }
    echo '
        <div class="alert alert-'.$estado.' alert-dismissible fade show" role="alert">
        <strong>'.$titulo.'</strong> '.$mensaje.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
}
function insertar($con){
    if(isset($_FILES['archivo']['name'])){
        guardarArchivo();
    }
    if ($_POST['ced_autor'] != ""){
        $sql = "INSERT INTO documentos (autor, tipo_doc, especialidad, fecha_subida) VALUES ('".$_POST['ced_autor']."',".$_POST['select_combo_documentos'].",".$_POST['select_combo_carreras'].", NOW())";
    } else {
        $sql = "ERROR";
    }
    if(mysqli_query($con,$sql)){
        Mensajero(1,"Exito","Exito al guardar el documento");
    }else{
        Mensajero(0,"Falló","Falló al ingresar documento, revise que los campos esten completamente llenos.");
    }
}
function eliminar($con){

}
function actualizar($con){

}
function guardarArchivo(){
    $direccion = "../../../files/";
    $dir_archivo = $direccion.basename($_FILES['archivo']['name']);
    move_uploaded_file($_FILES['archivo']['tmp_name'], $dir_archivo);
}
?>