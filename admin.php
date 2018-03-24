<?php
session_start();
$_SESSION['logged'] = false;
echo "<script> window.location.href = '/repositorio'</script>";
