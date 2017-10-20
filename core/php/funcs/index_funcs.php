<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 16/10/17
 * Time: 21:36
 */

if(isset($_POST['busqueda'])){
    $dato = queryAutor($_POST['busqueda']);
    echo $dato;
}
function queryAutor($autor){
    $sql = "select * from documentos where cedula=$autor";
    $res = conectar::ejecutar(conectar::conex(),$sql);
    return $res;
}
?>