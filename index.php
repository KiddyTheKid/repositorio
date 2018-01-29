<?php session_start();
include "core/php/concentrador.php";
if (isset($_SESSION['logged'])){
    if ($_SESSION['logged'] == true){
        $dir = "layout/admin_body.html";
    } else {
        $dir = "layout/login.php";
    }
} else {
    $dir = "layout/user_body.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("layout/head.html"); ?>
</head>
<body>
<?php include($dir); ?>
</body>
</html>
