<?php
/**
 *Para modificar el acceso a la base de datos
 *edite el archivo configuracion.json
 */
$ruta = dirname(dirname(__FILE__));
$config = $ruta."/data/cfg/configuracion.json";
$config = file_get_contents($config);
$config = json_decode($config);

define("RUTA_DOCUMENTOS", $config->{'ubicacion_documentos'});
define("HOST", $config->{'servidor'});
define("USER", $config->{'usuario_de_bd'});
define("PASS", $config->{'contrasena_bd'});
define("DB", $config->{'base_de_datos'});

class Database{
	private static $con;
	private static function isConnected()
	{
		if (self::$con == null)
		{
			self::Conectar();
		}
	}
	private static function Conectar()
	{
		self::$con = mysqli_connect(HOST, USER, PASS, DB);
		self::$con->set_charset("utf8");
	}

    /**
     * @param string $sql
     * @return mysqli_result
     */
    public static function Execute($sql)
    {
    	self::isConnected();
        return self::$con->query($sql);
    }
    public static function Sanar($campo)
    {
    	self::isConnected();
    	return mysqli_real_escape_string(self::$con, $campo);
    }
}
