<?php
class Autores{
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
        $sql = "SELECT * FROM autores
        WHERE cedula = '$cedula'";
        $resp = Database::Execute($sql)->fetch_row();
        $autor = new Autores();
        $autor->id = $resp[0];
        $autor->cedula = $resp[1];
        $autor->nombres = $resp[2];
        $autor->apellidos = $resp[3];
        $autor->correo = $resp[4];
        $autor->telefono = $resp[5];
        $autor->direccion = $resp[6];
        return $autor;
    }
    public static function buscarTodo()
    {
        $sql = "SELECT * FROM autores";
        $data = array();
        $resp = Database::Execute($sql);
        while ($row = $resp->fetch_row())
        {
            $autor = new Autores();
            $autor->id = $row[0];
            $autor->cedula = $row[1];
            $autor->nombres = $row[2];
            $autor->apellidos = $row[3];
            $autor->correo = $row[4];
            $autor->telefono = $row[5];
            $autor->direccion = $row[6];
            $data[] = $autor;
        }
        return $data;
    }
}
