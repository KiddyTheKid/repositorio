<?php
class jsonEditor{
    public function __construct()
    {
        $this->__comentario__ = null;
        $this->ubicacion_documentos = null;
        $this->servidor = null;
        $this->usuario_de_bd = null;
        $this->contrasena_bd = null;
        $this->base_de_datos = null;
    }
    public static function tomarArchivo($archivo)
    {
        $file = @file_get_contents("core/php/data/cfg/$archivo");
        $json = null;
        if (!$file)
        {
            $json = new jsonEditor();
            $jFile = json_encode($json);
            file_put_contents("core/php/data/cfg/configuracion.json", $jFile);
        } else {
            $file = json_decode($file);
            $json = new jsonEditor();
            $json->ubicacion_documentos = $file->{'ubicacion_documentos'};
            $json->servidor = $file->{'servidor'};
            $json->usuario_de_bd = $file->{'usuario_de_bd'};
            $json->contrasena_bd = $file->{'contrasena_bd'};
            $json->base_de_datos = $file->{'base_de_datos'};
            $json->__comentario__ = $file->{'__comentario__'};
        }
        return $json;
    }
    public static function guardar($jFile)
    {
        $jFile = json_encode($jFile);
        file_put_contents("core/php/data/cfg/configuracion.json", $jFile);
    }
}
$usr = "admin_tecno"; $pass = "admin_tecno";
$config = jsonEditor::tomarArchivo("configuracion.json");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ($usr === $_POST['usr'] && $pass === $_POST['cont'])
    {
        $config->__comentario__ = (isset($_POST['nota']))
        ? $_POST['nota'] : null;
        $config->ubicacion_documentos = (isset($_POST['direccion']))
        ? $_POST['direccion'] : null;
        $config->servidor = (isset($_POST['servidor']))
        ? $_POST['servidor'] : null;
        $config->usuario_de_bd = (isset($_POST['usuario']))
        ? $_POST['usuario'] : null;
        $config->contrasena_bd =
        (isset($_POST['pass']) && $_POST['pass'] != "")
        ? $_POST['pass'] : $config->contrasena_bd;
        $config->base_de_datos = (isset($_POST['bd']))
        ? $_POST['bd'] : null;
        jsonEditor::guardar($config);
        echo "Acción realizada";
    } else {
        echo "No tiene permisos para realizar esta acción";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Configuracion del Repositorio</title>
    </head>
    <body>
        <h2>Configuracion del repositorio</h2>
        <form method="post">
            <h4>Credencial</h4>
            <small>Usuario y contraseña para realizar cambios</small><br>
            <label for="usr">UserID</label>
            <input type="text" name="usr" id="usr">
            <label for="cont">Pw</label>
            <input type="password" name="cont" id="cont">
            <br><br>
            <label for="direccion">Ruta de Guardado de libros</label><br>
            <input type="text" name="direccion" id="direccion"
            style="width:18em;"
            value="<?php echo $config->ubicacion_documentos; ?>">
            <br>
            <label for="host">Servidor</label><br>
            <input type="text" name="servidor" id="servidor"
            value="<?php echo $config->servidor; ?>">
            <br>
            <label for="usuario">Usuario de la BD</label><br>
            <input type="text" name="usuario" id="usuario"
            value="<?php echo $config->usuario_de_bd; ?>">
            <br>
            <label for="pass">Contraseña de la BD</label><br>
            <input type="password" name="pass" id="pass">
            <br>
            <label for="bd">Nombre de la BD</label><br>
            <input type="text" name="bd" id="bd"
            value="<?php echo $config->base_de_datos; ?>">
            <br>
            <label for="detalle">Notas</label><br>
            <input type="text" name="nota" id="nota" style="width: 35em;"
            value="<?php echo $config->__comentario__; ?>">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>
