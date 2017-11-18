<?php
/**
 * Created by PhpStorm.
 * User: pcost8300
 * Date: 18/11/17
 * Time: 12:42
 */

include ("../data/con.php");
echo '<input class="form-control" list="'.$_POST['id'].'" name="'.$_POST['campo'].'" id="'.$_POST['campo'].'">';
echo '<datalist id="'.$_POST['id'].'">';
switch ($_POST['lista']){
    case 1:
        listaAutores($con);
        break;
}
echo '</datalist>';
function listaAutores($con){
    $sql = "SELECT cedula, nombres, apellidos FROM autores";
    $res = mysqli_query($con,$sql);
    while($row = $res->fetch_array()){
        echo '<option value="'.$row[0].'" label="'.$row[1].' '.$row[2].'"/>';
    }
}