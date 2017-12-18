<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 17/12/17
 * Time: 1:36
 */

include "../data/con.php";
switch ($_POST['op']){
    case 0:
        realizarBusqueda($con);
        break;
    case 1:
        realizarBusquedaAvanzada($con);
        break;
}
function realizarBusqueda($con){
    $q = $_POST['busqueda'];
    if ($q == ""){
        exit();
    }
    $preparar = preg_replace('!\s+!', ' ', $q);
    $qEx = explode(" ", $preparar);
    $newQex = array();
    foreach ($qEx as $ex){
        if ($ex != ""){
            $newQex[] = trim($ex);
        }
    }
    $busqueda = join("%' OR metaetiquetas LIKE '%", $newQex);
    $sql = "SELECT autor, tema, fecha_subida FROM documentos WHERE metaetiquetas LIKE '%$busqueda%' ";
    $resp = mysqli_query($con, $sql);
    while ($row = $resp->fetch_array()){
        generarCartaResultado($con, $row);
    }
}
function realizarBusquedaAvanzada($con){
    $q = $_POST['busqueda'];
    if ($q == ""){
        //exit();
    }
    $preparar = preg_replace('!\s+!', ' ', $q);
    $qEx = explode(" ", $preparar);
    $newQex = array();
    foreach ($qEx as $ex){
        if ($ex != ""){
            $newQex[] = trim($ex);
        }
    }
    $params = "";
    if (isset($_POST['carrera'])){
        $carrera = $_POST['carrera'];
        if ($carrera != 0){
            $params .= " AND especialidad = $carrera";
        }
    }
    if (isset($_POST['tipo_doc'])){
        $tipo_doc = $_POST['tipo_doc'];
        if ($tipo_doc != 0){
            $params .= " AND tipo_doc = $tipo_doc";
        }
    }
    if (isset($_POST['fecha'])){
        if ($_POST['fecha'] != ""){
            $fecha = DateTime::createFromFormat("Y-m", $_POST['fecha']);
            $anio = $fecha->format("Y");
            $mes = $fecha->format("m");
            $dia = $fecha->format("d");
            $params .= " AND YEAR(fecha_subida) = '$anio' AND MONTH(fecha_subida) = '$mes'";
        }
    }
    $busqueda = join("%' OR metaetiquetas LIKE '%", $newQex);
    $sql = "SELECT autor, tema, fecha_subida FROM documentos WHERE metaetiquetas LIKE '%$busqueda%' $params";
    $resp = mysqli_query($con, $sql);
    while ($row = $resp->fetch_array()){
        generarCartaResultado($con, $row);
    }

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
