<?php
class Carreras{
    public function __construct()
    {
        $this->id = null;
        $this->descripcion = null;
    }
    public static function buscarTodo()
    {
        $sql = "SELECT * FROM carreras";
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
        $sql = "SELECT * FROM carreras WHERE id = $id";
        $resp = Database::Execute($sql)->fetch_row();
        $carrera = new Carreras();
        $carrera->id = $resp[0];
        $carrera->descripcion = $resp[1];
        return $carrera;
    }
    public static function buscarPorDescripcion($busqueda)
    {
        $sql = "SELECT * FROM carreras WHERE descripcion LIKE '%$busqueda%'";
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
    public static function guardar($carrera)
    {
        $sql = "INSERT INTO carreras (descripcion)
        VALUES ('$carrera->descripcion')";
        if (Database::Execute($sql))
        {
            Cartero::crearMensaje(1, "Exito!", "Se creo correctamente");
        } else {
            Cartero::crearMensaje(2, "Error", "Por favor intente nuevamente");
        }
    }
    public static function eliminar($carrera)
    {
        $sql = "DELETE FROM carreras WHERE id = $carrera->id";
        if (Database::Execute($sql))
        {
            Cartero::crearMensaje(1, "Exito", "Registro eliminado");
        } else {
            Cartero::crearMensaje(2, "Error", "Registro no se pudo eliminar");
        }
    }
}
