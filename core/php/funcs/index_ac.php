<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 19/10/17
 * Time: 22:50
 */
include ("../data/con.php");
seleccionar($con);
function seleccionar($con){
    $sql = "select * from documentos";
    $res = mysqli_query($con,$sql);
    while ($row = $res->fetch_array()){
        echo '
        <table class="table">
        <tr>
        <td>'.$row[0].'</td>
        <td>'.$row[1].'</td>
        </tr>
        </table>
        ';
    }
}
