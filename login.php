<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if ( session_id() == '' || !isset( $_SESSION ) ) {
    session_start();
}

if ( isset( $_SESSION[ "username" ] ) ) {

    header( "location:index.php" );
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="skin-1">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">BP</h1>

            </div>
            <h3>Bienvenido al sistema de pruebas de Break Point</h3>
            <p>Sistema Web diseñado para la solucion de su negocio</p>
 
            <form class="m-t" role="form" method="POST" action="verify.php">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Correo electronico" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" required="" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                <a href="#"><small>¿Olvidaste tu contraseña?</small></a>
            </form>
            <p class="m-t"> <small>Desarrollado por BreakPoint Company &copy; <?php echo date("Y"); ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
