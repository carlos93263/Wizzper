<?php
    //Iniciamos sesion.
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <!-- CARGAR MI CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- CARGAR  JQUERY -->
        <script src="js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- CARGAR CSS SEMANTIC -->
        <link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
        <!-- CARGAR JS SEMANTIC -->
        <script src="dist/semantic.min.js" type="text/javascript"></script>
        <!-- CARGAR MI JS -->
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="ui equal width center aligned padded grid">
            <div class="row">
                <div class="column">
                    <div class="ui basic segment">
                        <img class="ui centered big image" src="media/logo/loguito.png">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    FILA IZQUIERDA, PARA PONER INFORMACION DE LA PAGINA BONITA.
                </div>
                <div class="column">
                    <form class="ui center aligned login orange form" method="POST" action="procs/login.proc.php">
                        <input type="hidden" name="login" value="si">
                        <h2 class="ui orange header">Login</h2>
                        <div class="field">
                            <div class="ui left icon input">
                                <input type="text" placeholder="Email" name="email">
                                <i class="mail icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <input type="password" placeholder="Password" name="password">
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="ui error message"></div>
                        <button class="ui orange button" type="submit">Login</button>
                        
                        <p>¿No dispones de una cuenta?<a href="registro.php"> Registrate! </a></p>
<!--                         <button class="ui orange button" type="button" onclick="location='registro.php'">Registro</button>
 -->                    </form>
                </div>
                <div class="column">
                    FILA DERECHA, PARA PONER INFORMACION DE LA PAGINA BONITA.
                </div>
            </div>
            <div class="row">
                <div class="column">FILA INFERIOR, PARA PONER INFORMACION DE LA PAGINA BONITA.</div>
            </div>
        </div>
    </body>
</html>