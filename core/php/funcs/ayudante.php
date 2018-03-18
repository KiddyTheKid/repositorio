<?php
class Cartero{
    public static function crearTarjeta($documento)
    {
        echo '
        <a href="../repoFiles/'.$documento->ruta.'"
        style="text-decoration:none; color: black;">
        <div class="card">
        <div class="card-body">
        <strong>'.$documento->tema.'</strong>
        <br>Por: '.$documento->autor.'
        <br>Trabajo: '.$documento->tipo_doc.'
         Carrera: '.$documento->especialidad.'
        <br>Creado: '.$documento->fecha_subida.'
        </div>
        </div>
        </a>
        ';
    }
    public static function crearMensaje($nivel, $titulo, $mensaje)
    {
        switch ($nivel){
            case 0:
                $estado = "danger";
                break;
            case 1:
                $estado = "success";
                break;
            case 2:
                $estado = "warning";
                break;
        }
        echo '
            <div class="alert alert-'.$estado.'
            alert-dismissible fade show" role="alert">
            <strong>'.$titulo.'</strong> '.$mensaje.'
            <button type="button" class="close"
            data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
    }
}
class Parametros{
    public static function agregarParametro($parametro, $columna)
    {
        if ($parametro != null)
        {
            if (self::esFecha($parametro))
            {
                return " and YEAR($columna) = YEAR($parametro)
                and MONTH($columna) = MONTH($parametro)";
            }
            return " and $columna = $parametro";
        }
    }
    public static function esFecha($fecha)
    {
        try {
            $f = new DateTime(trim($fecha));
        } catch (Exception $e){
            return false;
        }
        return true;
    }
    public static function dieEmpty($campo)
    {
    	if (empty($campo))
    	{
    		Cartero::crearMensaje(2, "Error", "Campos Vacios");
    		exit();
    	} else {
    		return $campo;
    	}
    }
}
class Archivos{
    public static function guardar($archivo, $docData){
        $carrera = Carreras::buscarPorId($docData->especialidad);
        $tipoDoc = TiposDocumentos::buscarPorId($docData->tipo_doc);
        $direccion = RUTA_DOCUMENTOS.$carrera->descripcion."/";
        $direccion .= $tipoDoc->descripcion."/".$docData->autor."/";
        if (!file_exists($direccion))
        {
            mkdir($direccion, 0777, true);
        }
        $nombreArchivo = $carrera->descripcion."/".$tipoDoc->descripcion."/";
        $nombreArchivo .= $docData->autor."/".$archivo['name'];
        $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $dir_archivo = $direccion.basename($archivo['name']);
        move_uploaded_file($archivo['tmp_name'], $dir_archivo);
        return $nombreArchivo;
    }
}
class TablasHTML{
	public function __construct()
	{
		$this->id = null;
		$this->cabecera = null;
		$this->contenido = null;
	}
	public static function crearTabla($tabla)
	{
		echo '
		<table class="table" id="'.$tabla->id.'">
		<thead>
		<tr>';
		foreach ($tabla->cabecera as $campo){
			echo '
			<th scope="col">'.$campo->name.'</th>';
		}
		echo '</tr></thead><tbody>';
    	while ($row = $tabla->contenido->fetch_row())
    	{
    		echo "<tr>";
    		foreach ($row as $f)
    		{
            	echo '<td>'.$f.'</td>';
            }
    		echo "</tr>";
    	}
    	echo '</tbody>';
	}
}
