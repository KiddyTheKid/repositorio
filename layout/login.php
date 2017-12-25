<script>
    function cancelar() {
        $.ajax({
            type: 'POST',
            url: 'core/php/funcs/admin_funcs.php',
            data: {accion:0},
            success: function () {
                window.location.href = "";
            }
        });
    }
</script>
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
                    <div class="form-group" style="padding-right: 2em">
                        <input type="submit" class="btn btn-light btn-outline-dark" value="Ingresar">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-light btn-outline-dark" onclick="cancelar()" value="Cancelar">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
if(isset($_POST['user']) && $_POST['user'] != ""){
    $ruta = dirname(dirname(__FILE__));
    require_once "$ruta/core/php/data/con.php";
    $ced = mysqli_real_escape_string($con,$_POST['user']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $pass = md5($pass);
    $sql = "SELECT nombres, apellidos, correo, password, nivel FROM usuarios WHERE cedula = '".$ced."'";
    $res = mysqli_query($con,$sql);
    $user_data = $res->fetch_row();
    $clave = $user_data[3];
    if($clave === $pass){
        $_SESSION['logged'] = true;
        $_SESSION['usuario_actual'] = array(
            "cedula"=>$ced,
            "nombres"=>$user_data[0],
            "apellidos"=>$user_data[1],
            "correo"=>$user_data[2],
            "nivel"=>$user_data[4]
        );
        echo '<script> window.location.href = "";</script>';
    }else{
        $_SESSION['logged'] = false;
    }
}
?>