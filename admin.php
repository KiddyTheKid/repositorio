<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 17/12/17
 * Time: 12:34
 */
session_start();
$_SESSION['logged'] = false;
echo "<script> window.location.href = '/repositorio'</script>";