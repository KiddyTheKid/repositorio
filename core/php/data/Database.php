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
$ruta = dirname(dirname(__FILE__));
$config = $ruta."/../../configuracion.json";
$config = file_get_contents($config);
$config = json_decode($config);
define("RUTA_DOCUMENTOS", $config->{'ubicacion_documentos'});
define("HOST", $config->{'servidor'});
define("USER", $config->{'usuario_de_bd'});
define("PASS", $config->{'contrasena_bd'});
define("DB", $config->{'base_de_datos'});

class Database{
    public static function Execute($sql)
    {
        $con = mysqli_connect(HOST, USER, PASS, DB);
        return $con->query($sql);
    }
}
