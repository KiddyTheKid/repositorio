<?php if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false): ?>
    <br>
    <div class="container">
        <div class="jumbotron">
            <form method="POST">
                <div class="row justify-content-center">
                    <img src="im/logo.png" width="50%" height="10%">
                </div>
                <div class="row justify-content-center">
                    <h1>Iniciar Sesion</h1>
                    <br>
                </div>
                <div class="row justify-content-center">
                    <label>Usuario</label>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <input type="text" class="form-control" id="user" name="user" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <label>Clave</label>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <input type="submit" class="btn btn-light btn-outline-dark" value="Ingresar">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true):
    include("layout/admin_body.html");
endif;
?>
<?php
if(isset($_POST['user']) && $_POST['user'] != ""){
    include("core/php/data/con.php");
    $ced = mysqli_real_escape_string($con,$_POST['user']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $pass = md5($pass);
    $sql = "SELECT * FROM usuarios WHERE cedula = '".$ced."'";
    $res = mysqli_query($con,$sql);
    $user_data = $res->fetch_row();
    $clave = $user_data[7];
    if($clave === $pass){
        $_SESSION['logged'] = true;
        echo '<script>window.location.href = "";</script>';
    }else{
        $_SESSION['logged'] = false;
    }
}
?>