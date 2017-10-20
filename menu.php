<?php
    session_start();
    require 'funcs/conexion.php';
    require 'funcs/funcs.php';

    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php");
    }

    $idUsuario = $_SESSION['id_usuario'];

    $sql = "SELECT id, nombre FROM usuarios WHERE id = $idUsuario";

    $resultado = $mysqli->query($sql);
    $row = $resultado->fetch_assoc();



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
    <title>Gestion de Personas</title>
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
    <!-- Vector Map  -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="assets/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="assets/plugins/morris/css/morris.css">
    <!-- Fonts -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo"><span>CECEP</span>S6AE</a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right">
                    <i class="fa fa-bars"></i>
                </button> <label class="lead">&nbsp;Gestio de Contratos</label>
            </div>
            <div class="user-nav">

                <ul>
                    <li class="profile-photo">
                        <img src="assets/img/avatar.png" alt="" class="img-circle">
                    </li>
                    
                    <li class="dropdown settings"> <?php echo utf8_decode($row['nombre']); ?></li>                    
                    
                    <li class="dropdown settings">
                        <a href='logout.php'>Cerrar Sesion</a>
                    </li>

                </ul>
                
            </div>
        </header>

        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                


            <div class="form-group" id="opciones">        
                    <div class="col-sm-10">

                        <!--Administrador-->
                        <?php if($_SESSION['tipo_usuario']==1) { ?>
                        <ul>
                            <li><a class="fa fa-sitemap" href="#" role="button">  Roles</a></li>
                            <li><a class="fa fa-building-o ciudad" href="php/ciudad/index.php" role="button"> Ciudades</a></li>
                            <li><a class="fa fa-briefcase pais" href="php/pais/index.php" role="button"> Pais</a></li>
                            <li><a class="fa fa-suitcase empresa" href="php/empresa/index.php" role="button"> Empresa</a></li>
                            <li><a class="fa fa-location-arrow sucursal" href="php/sucursal/index.php" role="button"> Sucursales</a></li>                            
                            <li><a class="fa fa-users" href="#" role="button"> Empleados</a></li>
                            <li><a class="fa fa-gears" href="#" role="button"> Procesos</a></li>
                            <li><a class="fa fa-crosshairs" href="#" role="button"> Seleccion</a></li>
                            <li><a class="fa fa-file-text-o" href="#" role="button"> Contratos</a></li>
                            <li><a class="fa fa-arrow-circle-down" href="#" role="button"> Informes</a></li>
                        </ul>
                        <?php } ?>

                        <!--Visitante-->
                        <?php if($_SESSION['tipo_usuario']==2) { ?>
                        <ul>

                        </ul>
                        <?php } ?>


                        <!--Gestor-->
                        <?php if($_SESSION['tipo_usuario']==3) { ?>
                        <ul>
                            <li><a class="fa fa-location-arrow sucursal" href="php/sucursal/index.php" role="button"> Sucursales</a></li>                            
                            <li><a class="fa fa-users" href="#" role="button"> Empleados</a></li>                            
                            <li><a class="fa fa-gears" href="#" role="button"> Procesos</a></li>
                        </ul>
                        <?php } ?>


                        <!--Coordinador-->
                        <?php if($_SESSION['tipo_usuario']==6) { ?>
                        <ul>
                            <li><a class="fa fa-crosshairs" href="#" role="button"> Seleccion</a></li>
                        </ul>
                        <?php } ?>


                        <!--Director-->
                        <?php if($_SESSION['tipo_usuario']==6) { ?>
                        <ul>
                            <li><a class="fa fa-crosshairs" href="#" role="button"> Seleccion</a></li>
                        </ul>
                        <?php } ?>
                        



                        <!--Empleado-->
                        <?php if($_SESSION['tipo_usuario']==4) { ?>
                        <ul>
                            <li><a class="fa fa-file-text-o" href="#" role="button"> Contratos</a></li>
                            <li><a class="fa fa-arrow-circle-down" href="#" role="button"> Informes</a></li>
                        </ul>
                        <?php } ?>




                        <!--Proveedor-->
                        <?php if($_SESSION['tipo_usuario']==8) { ?>
                        <ul>
                            <li><a class="fa fa-file-text-o" href="#" role="button"> Contratos</a></li>
                        </ul>
                        <?php } ?>
                        
                        
                    </div>
                </div>

            </div>

        </aside>
        <!--sidebar left end-->

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">


                <!--Contenido de la pagina-->

            
            <div class="panel-body">
             
        <div class="panel-group hide" id="contenedor"><div class="panel panel-primary">
            <div class="panel-heading" id="titulo"></div>
            <div class="panel-body">
                
                <div class="form-group" id="contenido">        
                    
                </div>
            
            </div>
            

                </div>
            </div>
        </div>

          


                <!--ToDo end-->
            </section>
        </section>
        <!--main content end-->

        <!--sidebar right end-->
    </section>
    <!--Global JS-->
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="assets/js/application.js"></script>
    <!--Page Level JS-->
    <script src="assets/plugins/countTo/jquery.countTo.js"></script>
    <script src="assets/plugins/weather/js/skycons.js"></script>
    <!-- FlotCharts  -->
    <script src="assets/plugins/flot/js/jquery.flot.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.resize.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.canvas.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.image.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.categories.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.crosshair.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.errorbars.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.navigate.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.pie.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.selection.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.stack.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.symbol.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.threshold.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.colorhelpers.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.time.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.example.js"></script>
    <!-- Morris  -->
    <script src="assets/plugins/morris/js/morris.min.js"></script>
    <script src="assets/plugins/morris/js/raphael.2.1.0.min.js"></script>
    <!-- Vector Map  -->
    <script src="assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ToDo List  -->
    <script src="assets/plugins/todo/js/todos.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    

    <!-- Funciones de Lógica de negocio -->
    <script src="js/funcionesJquery.js"></script>
    <script>
        $(document).ready(Inicio);
    </script>

    <!--Load these page level functions-->



<div class="footer-bottom"> 

            <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="copyright">

                    © 2017, Elisxeneth Tovar, Edinson Ortiz, Todos los derechos reservados

                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="design">

                     <a href="#">S6AE </a> |  <a target="_blank" href="https://www.cecep.edu.co/">Centro Colombiano de Estudios Profecionales - Enfasis II</a>

                </div>

            </div>

        </div>
    
</div>

</body>

</html>
