<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 21/10/17
 * Time: 22:07
 */
session_start();
include "../concentrador.php";

switch ($_POST['accion']){
    case 0:
        logout();
        break;
    case 1:
        insertarArchivo();
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
    case 5:
    	insertarTipoDoc();
    	break;
}
function insertarArchivo()
{
    $doc = new Documentos();
    $doc->autor = (isset($_POST['ced_autor'])
    && $_POST['ced_autor'] != "")? $_POST['ced_autor']:exit();
    $doc->tipo_doc = $_POST['select_combo_documentos'];
    $doc->especialidad = $_POST['select_combo_carreras'];
    $doc->etiquetas = $_POST['etiquetas'];
    $doc->tema = $_POST['tema'];

    $autor = Autores::buscarPorCedula($doc->autor);

    $nTema = preg_replace('!\s+!', ', ', $doc->tema);
    $nombreAutor = preg_replace('!\s+!', ', ',
    "$autor->nombres $autor->apellidos");

    $prep = $nombreAutor.", ".$nTema . ", " . $doc->etiquetas;
    $nEtiquetas = preg_replace('!\s+!', ' ', $prep);
    $metaArreglo = explode(",", $nEtiquetas);
    $metaData = convertirSinMeta($metaArreglo);
    $doc->etiquetas = $metaData;
    $doc->metaetiquetas = $metaData;
    $doc->ruta = (isset($_FILES['archivo'])) ?
    Archivos::guardar($_FILES['archivo']) : exit();

    Documentos::guardar($doc);
}
function insertarTipoDoc()
{
	$tipoDoc = new TiposDocumentos();
	$tipoDoc->descripcion = (isset($_POST['tDoc']) && $_POST['tDoc'] != "")
	? $_POST['tDoc'] : exit();
	TiposDocumentos::guardar($tipoDoc);
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
function convertirMeta($data){
    $respuesta = array();
    foreach ($data as $datum){
        $respuesta[] = metaphone($datum);
    }
    return join(" ", $respuesta);
}
function convertirSinMeta($data){
    $respuesta = array();
    foreach ($data as $datum){
        $respuesta[] = $datum;
    }
    return join(" ", $respuesta);
}
function buscarNombres($con, $cedula){
    $sql = "SELECT nombres, apellidos FROM autores WHERE cedula = '$cedula'";
    $resp = mysqli_query($con, $sql);
    $fila = $resp->fetch_row();
    $nombrs = $fila[0]." ".$fila[1];
    return $nombrs;
}
?>
