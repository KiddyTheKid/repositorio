<?php
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
        insertarUsuario();
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
    Archivos::guardar($_FILES['archivo'], $doc) : exit();

    Documentos::guardar($doc);
}
function insertarTipoDoc()
{
	$tipoDoc = new TiposDocumentos();
	$tipoDoc->descripcion = (isset($_POST['tDoc']) && $_POST['tDoc'] != "")
	? $_POST['tDoc'] : exit();
	TiposDocumentos::guardar($tipoDoc);
}

function insertarAutor(){
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
function insertarUsuario(){
	$usr = new Usuarios();
	$usr->cedula = $_POST['cedula'];
	$usr->nombres = $_POST['nombres'];
	$usr->apellidos = $_POST['apellidos'];
	$usr->correo = $_POST['email'];
	$usr->direccion = $_POST['direccion'];
	$usr->telefono = $_POST['telf'];
	if ($usr->cedula == "")
	{
		Cartero::crearMensaje(2, "Error", "No hay Numero de Cedula");
		exit();
	}
    if (Usuarios::crear($usr)){
        Cartero::crearMensaje(1,"Exito","El usuario fue creado con exito");
    } else {
        Cartero::crearMensaje(0,"Fallido","Error al crear el usuario.");
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
	session_start();
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
