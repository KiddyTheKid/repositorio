<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 17/12/17
 * Time: 1:36
 */

//include "../data/con.php";
include "../concentrador.php";
switch ($_POST['op']){
    case 0:
        realizarBusqueda();
        break;
    case 1:
        realizarBusquedaAvanzada();
        break;
}
function realizarBusqueda(){
    $doc = new Documentos();
    $doc->tema = (isset($_POST['busqueda']) && !empty($_POST['busqueda']))?
    $_POST['busqueda'] : exit();
    Documentos::buscarDocumento($doc);
}
function realizarBusquedaAvanzada(){
    $doc = new Documentos();
    $doc->tema = (isset($_POST['busqueda']) && !empty($_POST['busqueda']))?
    $_POST['busqueda'] : exit();
    $doc->especialidad = (isset($_POST['carrera']) && $_POST['carrera'] != 0)?
    $_POST['carrera'] : null;
    $doc->tipo_doc = (isset($_POST['tipo_doc']) && $_POST['tipo_doc'] != 0)?
    $_POST['tipo_doc'] : null;
    $doc->fecha_subida = (isset($_POST['fecha']))?$_POST['fecha']:null;
    Documentos::buscarDocumento($doc);
}
function generarCartaResultado($con, $dato){
    $autor = buscarAutor($con, $dato[0]);
    echo '
    <div class="card">
    <div class="card-body">
    <strong>'.$dato[1].'</strong> <br>Por: '.$autor.' <br>Subido en: '.$dato[2].'
    </div>
    </div>
    ';

}
function buscarAutor($con, $cedula){
    $sql = "SELECT nombres, apellidos FROM autores WHERE cedula = '$cedula'";
    $resp = mysqli_query($con, $sql);
    $fila = $resp->fetch_row();
    $nombres = $fila[0]." ".$fila[1];
    return $nombres;
}
