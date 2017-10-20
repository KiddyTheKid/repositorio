<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 16/10/17
 * Time: 21:29
 */

class conectar
{
    public static function conex(){
        define("SERVER","localhost");
        define("USERNAME","pcost8300");
        define("PASSWORD","megamanzero001");
        define("DB_DATA","repositoriobd");
        $db = mysqli_connect(SERVER,USERNAME, PASSWORD, DB_DATA);
        return $db;
    }
    public static function ejecutar($db,$sql){
        $res = mysqli_query($db, $sql);
        return $res;
    }
}