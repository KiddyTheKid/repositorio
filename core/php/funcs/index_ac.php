<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 19/10/17
 * Time: 22:50
 */
require_once "../../php/data/con.php";
function seleccionar(){
    $sql = "select * from documentos";
    $res = mysqli_query($con,$sql);
    while ($row = $res->fetch_array()){
        echo $row[1];
    }
}
