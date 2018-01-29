<?php
/**
 *Para modificar el acceso a la base de datos
 *edite el archivo configuracion.json
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
