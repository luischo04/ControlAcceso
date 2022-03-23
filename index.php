<?php
    require_once("config/conexion.php");
    if(isset($_POST["enviar"]) && $_POST["enviar"] == "si") {
        require_once("models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    } 
?>
<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>

	<link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="public/img/favicon.png" rel="icon" type="image/png">
	<link href="public/img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="POST" id="login_form">
                    <input type="hidden" name="id_rol" id="id_rol" value="2">
                    <div class="sign-avatar">
                        <img src="public/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title" id="lbltitulo">Acceso seguridad</header>

                    <?php
                        if (isset($_GET["m"])) {
                            switch($_GET["m"]) {
                                case "1";
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="d-flex align-itmes-center justify-content-start">
                                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                            <span>El usuario y/o contrasena son incorrectos</span>
                                        </div>
                                    </div>
                                <?php
                                break;
                                 case "2";
                                 ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="d-flex align-itmes-center justify-content-start">
                                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                            <span>Los campos estan vacios</span>
                                        </div>
                                    </div>
                                 <?php
                                 break;
                            }
                        }
                    ?>

                    <div class="form-group">
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Correo electronico"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group">
                        <!-- <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div> 
                        <div class="float-right reset">
                            <a href="reset-password.html">Restablecer contraseña</a>
                        </div> -->
                        <div class="float-left reset">
                            <a href="#" id="btncambiar">Acceso administrador</a>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Iniciar</button>
                    <!-- <p class="sign-note"> No tienes una cuenta? <a href="sign-up.html">Registrate</a></p>
                    <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="public/js/lib/jquery/jquery.min.js"></script>
<script src="public/js/lib/tether/tether.min.js"></script>
<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="public/js/plugins.js"></script>
<script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="public/js/app.js"></script>
<script src="index.js"></script>
</body>
</html>