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
    $ced = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $usuario = Usuarios::buscarPorCedula($ced);
    if($usuario->password === $pass){
        $_SESSION['logged'] = true;
        $_SESSION['usuario_actual'] = serialize($usuario);
        echo '<script> window.location.href = "";</script>';
    }else{
        $_SESSION['logged'] = false;
    }
}
?>
