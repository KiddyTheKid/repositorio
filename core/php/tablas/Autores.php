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
    public static function buscarPorId($id)
    {
    	$id = Database::Sanar($id);
    	$sql = "SELECT * FROM ".self::$tabla." WHERE id = $id";
    	$resp = Database::Execute($sql);
    	return self::autorCatcher($resp->fetch_assoc());
    }
    public static function buscarPorCedula($cedula)
    {
    	$cedula = Database::Sanar($cedula);
        $sql = "SELECT * FROM ".self::$tabla." WHERE cedula = '$cedula'";
        $resp = Database::Execute($sql);
        return self::autorCatcher($resp->fetch_assoc());
    }
    public static function eliminar($id)
    {
    	$id = Database::Sanar($id);
    	$sql = "DELETE FROM ".self::$tabla." WHERE id = $id";
    	return Database::Execute($sql);
    }
    public static function editar($autor)
    {
    	$ced = Database::Sanar($autor->cedula);
    	$a = Database::Sanar($autor->nombres);
    	$b = Database::Sanar($autor->apellidos);
    	$c = Database::Sanar($autor->correo);
    	$d = Database::Sanar($autor->telefono);
    	$e = Database::Sanar($autor->direccion);
    	$sql = "UPDATE ".self::$tabla." SET nombres = '$a', apellidos = '$b', 
    		correo = '$c', telefono = '$d', direccion='$e' WHERE cedula = '$ced'";
    	return Database::Execute($sql);
    	
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
    public static function buscarEnPagina($pagina, $dato)
    {
    	if ($dato != "")
    	{
    		$val = $dato;
    		$dato = "WHERE nombres like '%$val%' or ";
    		$dato .= "apellidos like '%$val%' or ";
    		$dato .= "cedula like '%$val%'";
    		
    	}
    	$pagina = Database::Sanar($pagina);
    	$sql = "SELECT * FROM ".self::$tabla." $dato LIMIT $pagina, 30";
    	$resp = Database::Execute($sql);
    	$autores = array();
    	while ($row = $resp->fetch_assoc())
    	{
    		$autores[] = self::autorCatcher($row); 
    	}
    	return $autores;
    }
    public static function crear($a)
    {
    	if (self::existeAutor($a))
    	{
    		Cartero::crearMensaje(0, "Error", "Este autor ya existe!");
    		exit();
    	}
    	$a->cedula = Database::Sanar($a->cedula);
    	$a->nombres = Database::Sanar($a->nombres);
    	$a->apellidos = Database::Sanar($a->apellidos);
    	$a->correo = Database::Sanar($a->correo);
    	$a->telefono = Database::Sanar($a->telefono);
    	$a->direccion = Database::Sanar($a->direccion);
    	$sql = "INSERT INTO ".self::$tabla." (cedula, nombres, apellidos, correo, telefono, direccion) 
    		VALUES ('$a->cedula', '$a->nombres', '$a->apellidos', '$a->correo', '$a->telefono', '$a->direccion')";
    	return Database::Execute($sql);    	
    }
    private static function existeAutor($a)
    {
    	$a->cedula = Database::Sanar($a->cedula);
    	$sql = "SELECT * FROM ".self::$tabla." WHERE cedula = '$a->cedula'";
    	$resp = Database::Execute($sql);
    	return mysqli_num_rows($resp) > 0;
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
