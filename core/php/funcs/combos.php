<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 21/10/17
 * Time: 15:48
 */
include ("../data/con.php");
echo '<select class="custom-select">';
switch ($_POST['combo']){
    case 1:
        comboCarreras($con);
        break;
    case 2:
        comboDocumentosTipos($con);
        break;
}
echo '</select>';

function comboCarreras($con){
    $sql = "SELECT * FROM carreras";
    $res = mysqli_query($con,$sql);
    while($row = $res->fetch_array()){
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
}
function comboDocumentosTipos($con){
    $sql = "SELECT * FROM tipos_documentos";
    $res = mysqli_query($con,$sql);
    while($row = $res->fetch_array()){
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
}