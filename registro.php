<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	$errors = array();
	
	if(!empty($_POST))
	{
		$nombre = $mysqli->real_escape_string($_POST['nombre']);	
		$usuario = $mysqli->real_escape_string($_POST['usuario']);	
		$password = $mysqli->real_escape_string($_POST['password']);	
		$con_password = $mysqli->real_escape_string($_POST['con_password']);	
		$email = $mysqli->real_escape_string($_POST['email']);	
		$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
		
		$activo = 0;
		$tipo_usuario = 2;
		$secret = '6LcpODMUAAAAAMNsXQ3No1-ir7h4OJCbRxbHqteC';
		
		if(!$captcha){
			$errors[] = "Por favor verifica el captcha";
		}
		
		if(isNull($nombre, $usuario, $password, $con_password, $email))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		if(!isEmail($email))
		{
			$errors[] = "Dirección de correo inválida";
		}
		
		if(!validaPassword($password, $con_password))
		{
			$errors[] = "Las contraseñas no coinciden";
		}
		
		if(usuarioExiste($usuario))
		{
			$errors[] = "El nombre de usuario $usuario ya existe";
		}
		
		if(emailExiste($email))
		{
			$errors[] = "El correo electronico $email ya existe";
		}
		
		if(count($errors) == 0)
		{
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				
				$pass_hash = hashPassword($password);
				$token = generateToken();
				
				$registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
				


				$url = 'http://'.$_SERVER["SERVER_NAME"].'/contratos/activar.php?id='.$registro.'&val='.$token;


					

				if($registro > 0 )
				{
					

					echo "Para terminar el proceso de registro ingrese al siguiente link";
					echo "<br><a href='$url' >Activacion</a>";
					exit;				
				


					/*

					$url = 'http://'.$_SERVER["SERVER_NAME"].'/contratosceep/activar.php?id='.$registro.'&val='.$token;
					
					$asunto = 'Activar Cuenta - Sistema de Usuarios';
					$cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";
					
					

					if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
					
					echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
					
					echo "<br><a href='index.php' >Iniciar Sesion</a>";
					exit;
					
					} else {
						$erros[] = "Error al enviar Email";
					}

					*/
					
					} else {
					$errors[] = "Error al Registrar";
				}
				
				} else {
				$errors[] = 'Error al comprobar Captcha';
			}
			
		}
		
	}
	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">     
                           Registro
                           <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php">Iniciar Sesi&oacute;n</a></div>
                        </h3>      
                    </div>
                    <div class="panel-body">
                       <p> Login.</p>
                        <form class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required autofocus>
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

							
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required autofocus>
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>



                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>



                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirmar Password" required>
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>


                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php if(isset($email)) echo $email; ?>" required>
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>



                            <div class="form-group">
                               <div class="col-md-1">
									<div class="g-recaptcha" data-sitekey="6LcpODMUAAAAAHcGVqzlp_zm5spCYgTY3Q7CSKlk"></div>
                                </div>
                            </div>



                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block" value="Registrar" >
                               </div>
                            </div>
                        </form>
                        <?php echo resultBlock($errors); ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Global JS-->
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="assets/plugins/nanoScroller/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/application.js"></script>
           <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');

</script>
</body>

</html>
