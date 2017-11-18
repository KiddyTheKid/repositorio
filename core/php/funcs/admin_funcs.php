<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 21/10/17
 * Time: 22:07
 */
session_start();
include "../data/con.php";
switch ($_POST['accion']){
    case 0:
        logout();
        break;
    case 1:
        insertarArchivo($con);
        break;
    case 2:
        insertarAutor($con);
        break;
    case 3:
        insertarUsuario($con);
        break;
    case 4:
        updatePass($con);
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
        case 2:
            $estado = "warning";
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
function insertarArchivo($con){
    if ($_POST['ced_autor'] != ""){
        $sql = "INSERT INTO documentos (autor, tipo_doc, especialidad, fecha_subida) VALUES ('".$_POST['ced_autor']."',".$_POST['select_combo_documentos'].",".$_POST['select_combo_carreras'].", NOW())";
        if(isset($_FILES['archivo']['name'])){
            guardarArchivo();
        }
    } else {
        $sql = "ERROR";
    }
    if(mysqli_query($con,$sql)){
        Mensajero(1,"Exito","Exito al guardar el documento.");
    }else{
        Mensajero(0,"Falló","Falló al ingresar documento, revise que los campos esten completamente llenos.");
    }
}
function eliminar($con){

}
function actualizar($con){

}
function guardarArchivo(){
    $direccion = RUTA_DOCUMENTOS;
    $ext = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
    $fecha =  date("Y-M-Dhis");
    $dir_archivo = $direccion.basename($fecha.$ext);
    move_uploaded_file($_FILES['archivo']['tmp_name'], $dir_archivo);
}
function insertarAutor($con){
    if($_POST['cedula'] == "" || $_POST['nombres'] == "" || $_POST['apellidos'] == ""){
        $sql = "ERROR";
    } else {
        $sql = "INSERT INTO autores (cedula, nombres, apellidos, correo, telefono, direccion) ";
        $sql = $sql."VALUES ('".$_POST['cedula']."', '".$_POST['nombres']."', '".$_POST['apellidos']."', '".$_POST['email']."', '".$_POST['telf']."', '".$_POST['direccion']."')";
    }
    if (existeAutor($con)){
        Mensajero(0,"Error","El autor ya existe.");
        exit();
    }
    if (mysqli_query($con,$sql)){
        Mensajero(1,"Exito","El autor fue creado con exito");
    } else {
        Mensajero(0,"Fallido","Error al crear el autor.");
    }
}
function insertarUsuario($con){
    if($_POST['cedula'] == "" || $_POST['nombres'] == "" || $_POST['apellidos'] == ""){
        $sql = "ERROR";
    } else {
        $pass = md5($_POST['cedula']);
        $sql = "INSERT INTO usuarios (cedula, nombres, apellidos, correo, telefono, direccion, password, nivel) ";
        $sql = $sql . "VALUES ('" . $_POST['cedula'] . "', '" . $_POST['nombres'] . "', '" . $_POST['apellidos'] . "', '" . $_POST['email'] . "', '" . $_POST['telf'] . "', '" . $_POST['direccion'] . "', '" . $pass . "', 0)";
    }
    if (mysqli_query($con,$sql)){
        Mensajero(1,"Exito","El usuario fue creado con exito");
    } else {
        Mensajero(0,"Fallido","Error al crear el usuario.");
    }
}
function updatePass($con){
    $verifSql = "SELECT password FROM usuarios WHERE cedula = '".$_SESSION['usuario_actual']['cedula']."'";
    $verifRes = mysqli_query($con,$verifSql);
    $verifRes = $verifRes->fetch_row();
    $verifRes = $verifRes[0];
    $sql = "UPDATE usuarios SET password = '".md5($_POST['pw_nuevo'])."' WHERE cedula = '".$_SESSION['usuario_actual']['cedula']."'";
    if ($_POST['pw_nuevo'] == "" || $_POST['pw_confirm'] == ""){
        Mensajero(2,"Aténcion!","Lo nueva contraseña no puede estar vacia.");
        exit();
    }
    if ($_POST['pw_nuevo'] == $_POST['pw_confirm']){
        if (md5($_POST['pw_anterior']) ==  $verifRes){
            if (mysqli_query($con,$sql)){
                Mensajero(1,"Exito","Contraseña Actualizada con exito.");
            } else {
                Mensajero(0,"Falló","Fallo al cambiar la contraseña.");
            }
        } else {
            Mensajero(0,"Verificar","La contraseña anterior es incorrecta.");
        }
    } else {
        Mensajero(0,"Contraseñas","La contraseña nueva no coincide.");
    }

}
function existeAutor($con){
    $sql = "SELECT * FROM autores where cedula = '".$_POST['cedula']."'";
    $res = mysqli_query($con,$sql);
    if($res->num_rows === 0){
        return false;
    } else {
        return true;
    }
}
function logout(){
    session_destroy();
}
?>
