<?php
class Autores{
	private static $tabla = "autores";
    public function __construct()
    {
        $this->id = null;
        $this->cedula = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->correo = null;
        $this->telefono = null;
        $this->direccion = null;
    }
    public static function buscarPorCedula($cedula)
    {
        $sql = "SELECT * FROM ".self::$tabla." WHERE cedula = '$cedula'";
        $resp = Database::Execute($sql);
        return self::autorCatcher($resp->fetch_assoc());
    }
    public static function buscarTodo()
    {
        $sql = "SELECT * FROM ".self::$tabla;
        $autores = array();
        $resp = Database::Execute($sql);
        while ($row = $resp->fetch_assoc())
        {
            $autores[] = self::autorCatcher($row);
        }
        return $autores;
    }
    private static function autorCatcher($row)
    {
    	extract($row);
    	$autor = new Autores();
    	$autor->id = $id;
    	$autor->cedula = $cedula;
    	$autor->nombres = $nombres;
    	$autor->apellidos = $apellidos;
    	$autor->correo = $correo;
    	$autor->telefono = $telefono;
    	$autor->direccion = $direccion;
    	return $autor;
    }
}
