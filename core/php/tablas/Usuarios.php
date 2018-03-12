<?php
class Usuarios{
	private static $tabla = "usuarios";
    public function __construct(){
        $this->id = null;
        $this->cedula = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->correo = null;
        $this->telefono = null;
        $this->direccion = null;
        $this->password = null;
        $this->nivel = null;
    }
    public static function buscarPorId($id)
    {
    	$id = Database::Sanar($id);
    	$sql = "SELECT * FROM ".self::$tabla." WHERE id = $id";
    	$resp = Database::Execute($sql);
    	return self::usuarioCatcher($resp->fetch_assoc());
    }
    public static function buscarPorCedula($cedula)
    {
    	$cedula = Database::Sanar($cedula);
        $sql = "SELECT * FROM ".self::$tabla." WHERE cedula = '$cedula'";
        $resp = Database::Execute($sql);
        return self::usuarioCatcher($resp->fetch_assoc());
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
    	$usuarios = array();
    	while ($row = $resp->fetch_assoc())
    	{
    		$usuarios[] = self::usuarioCatcher($row); 
    	}
    	return $usuarios;
    }
    public static function crear($u)
    {
    	if (self::existeUsuario($u->cedula))
    	{
    		Cartero::crearMensaje(0, "Error", "El usuario ya existe");
    		exit();
    	}
    	$cedula = Database::Sanar($u->cedula);
    	$nombres = Database::Sanar($u->nombres);
    	$apellidos = Database::Sanar($u->apellidos);
    	$correo = Database::Sanar($u->correo);
    	$telefono = Database::Sanar($u->telefono);
    	$direccion = Database::Sanar($u->direccion);
    	$password = md5($cedula);
    	$nivel = 0;
    	$sql = "INSERT INTO ".self::$tabla." 
    	(cedula, nombres, apellidos, correo, telefono, direccion, password, nivel) 
    	VALUES ('$cedula', '$nombres', '$apellidos', '$correo', '$telefono', '$direccion', '$password', $nivel)";
    	return Database::Execute($sql);
    }
    public static function actualizarPass($u)
    {
    	$id = Database::Sanar($u->id);
    	$pass = $u->password;
    	$sql = "UPDATE ".self::$tabla." SET password = '$pass' WHERE id = $id";
    	return Database::Execute($sql);
    }
    public static function eliminar($id)
    {
    	$id = Database::Sanar($id);
    	$sql = "DELETE FROM ".self::$tabla." WHERE id = $id";
    	return Database::Execute($sql);
    }
    private static function existeUsuario($cedula)
    {
    	$cedula = Database::Sanar($cedula);
    	$sql = "SELECT * FROM ".self::$tabla." WHERE cedula = '$cedula'";
    	$resp = Database::Execute($sql);
    	return mysqli_num_rows($resp) > 0;
    }
    private static function usuarioCatcher($row)
    {
    	extract($row);
    	$usuario = new Usuarios();
        $usuario->id = $id;
        $usuario->cedula = $cedula;
        $usuario->nombres = $nombres;
        $usuario->apellidos = $apellidos;
        $usuario->correo = $correo;
        $usuario->telefono = $telefono;
        $usuario->direccion = $direccion;
        $usuario->password = $password;
        $usuario->nivel = $nivel;
        return $usuario;
    }
}
