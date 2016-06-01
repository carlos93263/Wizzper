<?php
    //Iniciamos sesion.
    session_start();
    session_destroy();
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Registro</title>
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
                        <img class="ui centered medium image" src="media/logo/loguito.png">
                    </div>
                </div>
            </div>
            <div class="row">
			    <div class="five wide column"></div>
                <div class="six wide column">
                    <form class="ui center aligned registro orange form" method="POST" action="procs/registro.proc.php">
                        <h2 class="ui orange header">Registro</h2>
                        <div class="ui orange padded center aligned segment">
                            <h5>Datos Públicos</h5>
                            <div class="field">
                                <div class="ui left icon input">
                                    <input type="text" placeholder="Apodo // Nickname" name="nickname">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="inline center aligned fields">
                                <label for="gender">Sexo:</label>
                                <div class="field">
                                  <div class="ui radio checkbox">
                                    <input type="radio" name="gender" value="hombre" checked="" tabindex="0" class="hidden">
                                    <label>Hombre</label>
                                  </div>
                                </div>
                                <div class="field">
                                  <div class="ui radio checkbox">
                                    <input type="radio" name="gender" value="mujer" tabindex="0" class="hidden">
                                    <label>Mujer</label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui orange padded center aligned segment">
                            <h5>Datos Privados</h5>
                            <div class="field">
                                <div class="ui left icon input">
                                    <input type="text" placeholder="Email" name="email">
                                    <i class="mail icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <input type="password" placeholder="Contraseña" name="password">
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="nombre" placeholder="Nombre">
                                    </div>
                                    <div class="field">
                                        <input type="text" name="apellidos" placeholder="Apellidos">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
								<label>Fecha de Nacimiento</label>
                                <div class="ui left icon input">
                                    <input type="date" name="dateofbirth" max='<?php echo $nuevafecha;?>' value='<?php echo $nuevafecha;?>' required>
                                    <i class="calendar icon"></i>
                                </div>
                            </div>
                            <div class="required inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="terms">
                                    <label>Acepto los <a href="#">Terminos y Condiciones de uso.</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="ui error message"></div>
                        <button class="ui orange button" type="button" onclick="location='login.php'">Atrás</button>
                        <button class="ui orange button" type="submit">Registrarse</button>
                    </form>
                </div>
				<div class="five wide column"></div>
            </div>
        </div>
    </body>
</html>