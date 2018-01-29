<?php
/**
 *@RUTA_DOCUMENTOS
 *Aqui se debe cambiar la ubicacion dependiendo del equipo servidor
 *si es un sistema windows obviamente se usara C:/direccion_carpeta
 */
/*
define("RUTA_DOCUMENTOS", "/opt/lampp/htdocs/repoFiles/");
define("HOST","localhost");
define("USER","pcost8300");
define("PASS","megamanzero001");
define("DB","repositoriobd");
*/

define("RUTA_DOCUMENTOS", "C:/xampp/htdocs/repoFiles/");
define("HOST","localhost");
define("USER","root");
define("PASS","Sebas081120");
define("DB","repositoriobd");

class Database{
    public static function Execute($sql)
    {
        $con = mysqli_connect(HOST, USER, PASS, DB);
        return $con->query($sql);
    }
}
