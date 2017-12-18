<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedro
 * Date: 19/10/17
 * Time: 21:14
 */

//define("RUTA_DOCUMENTOS","/opt/lampp/htdocs/repoFiles/");
define("RUTA_DOCUMENTOS", "/var/www/html/repoFiles/");

define("HOST","localhost");
define("USER","pcost8300");
define("PASS","megamanzero001");
define("DB","repositoriobd");
$con = mysqli_connect(HOST,USER,PASS,DB);
?>