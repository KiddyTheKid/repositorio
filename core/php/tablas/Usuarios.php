<?php
class Usuarios{
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
    public static function buscarPorCedula($cedula)
    {
        $sql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
        $resp = Database::Execute($sql)->fetch_row();
        $usuario = new Usuarios();
        $usuario->id = $resp[0];
        $usuario->cedula = $resp[1];
        $usuario->nombres = $resp[2];
        $usuario->apellidos = $resp[3];
        $usuario->correo = $resp[4];
        $usuario->telefono = $resp[5];
        $usuario->direccion = $resp[6];
        $usuario->password = $resp[7];
        $usuario->nivel = $resp[8];
        return $usuario;
    }
}
