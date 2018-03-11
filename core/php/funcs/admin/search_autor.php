<?php
include "../../concentrador.php";

$autor = Autores::buscarPorId($_POST['ide']);
echo json_encode($autor);
