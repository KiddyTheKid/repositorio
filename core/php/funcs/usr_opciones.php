<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 17/12/17
 * Time: 16:46
 */
include "core/php/data/con.php";
function cargarTiposDocs(){
    global $con;
    $sql = "SELECT * FROM tipos_documentos";
    $resp = mysqli_query($con, $sql);
    while ($row = $resp->fetch_array()){
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }

}
function cargarCarreras(){
    global $con;
    $sql = "SELECT * FROM carreras";
    $resp = mysqli_query($con, $sql);
    while ($row = $resp->fetch_array()){
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
}