<?php
class Carreras{
	private static $tabla = "carreras";
    public function __construct()
    {
        $this->id = null;
        $this->descripcion = null;
    }
    public static function buscarTodo()
    {
        $sql = "SELECT * FROM ".self::$tabla;
        $data = array();
        $resp = Database::Execute($sql);
        while ($row = $resp->fetch_row())
        {
            $carrera = new Carreras();
            $carrera->id = $row[0];
            $carrera->descripcion = $row[1];
            $data[] = $carrera;
        }
        return $data;
    }
    public static function buscarPorId($id)
    {
        $sql = "SELECT * FROM ".self::$tabla." WHERE id = $id";
        $resp = Database::Execute($sql)->fetch_row();
        $carrera = new Carreras();
        $carrera->id = $resp[0];
        $carrera->descripcion = $resp[1];
        return $carrera;
    }
    public static function buscarPorDescripcion($busqueda)
    {
        $sql = "SELECT * FROM ".self::$tabla." WHERE descripcion LIKE '%$busqueda%'";
        $data = array();
        $resp = Database::Execute($sql);
        while ($row = $resp->fetch_row())
        {
            $carrera = new Carreras();
            $carrera->id = $row[0];
            $carrera->descripcion = $row[1];
            $data[] = $carrera;
        }
        return $data;
    }
    public static function buscarEnPagina($pagina, $dato)
    {
    	if ($dato != "")
    	{
    		$val = $dato;
    		$dato = "WHERE descripcion like '%$val%'";
    		
    	}
    	$pagina = Database::Sanar($pagina);
    	$sql = "SELECT * FROM ".self::$tabla." $dato LIMIT $pagina, 30";
    	$resp = Database::Execute($sql);
    	$carreras = array();
    	while ($row = $resp->fetch_assoc())
    	{
    		$carreras[] = self::carreraCatcher($row); 
    	}
    	return $carreras;
    }
    public static function guardar($carrera)
    {
    	$carrera->descripcion = Database::Sanar($carrera->descripcion);
        $sql = "INSERT INTO ".self::$tabla." (descripcion)
        VALUES ('$carrera->descripcion')";
        if (Database::Execute($sql))
        {
            Cartero::crearMensaje(1, "Exito!", "Se creo correctamente");
        } else {
            Cartero::crearMensaje(2, "Error", "Por favor intente nuevamente");
        }
    }
    public static function editar($carrera)
    {
    	$carrera->id = Database::Sanar($carrera->id);
    	$carrera->descripcion = Database::Sanar($carrera->descripcion);
    	$sql = "UPDATE ".self::$tabla." SET descripcion = '$carrera->descripcion' 
    	WHERE id = $carrera->id";
    	if (Database::Execute($sql))
    	{
            Cartero::crearMensaje(1, "Exito!", "Se editó correctamente");
        } else {
            Cartero::crearMensaje(2, "Error", "Por favor intente nuevamente");
        }
    }
    public static function borrar($carrera)
    {
    	$carrera->id = Database::Sanar($carrera->id);
        $sql = "DELETE FROM ".self::$tabla." WHERE id = $carrera->id";
        if (Database::Execute($sql))
        {
            Cartero::crearMensaje(1, "Exito", "Registro eliminado");
        } else {
            Cartero::crearMensaje(2, "Error", "Registro no se pudo eliminar");
        }
    }
    private static function carreraCatcher($row)
    {
    	extract($row);
    	$carrera = new Carreras();
    	$carrera->id = $id;
    	$carrera->descripcion = $descripcion;
    	return $carrera;
    }
}
