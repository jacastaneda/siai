<?php
//hola mundo
session_start();
if (isset($_SESSION['siai']['usuario']) && isset($_SESSION['siai']['expediente']) && isset($_SESSION['siai']['control'])) {
    header('Location: irPaso.php');
}
require_once("clases/ClassConexion.php");
include_once("clases/ClassControl.php");
include_once("clases/ClassFranjas.php");
$control= new Control();
$control->setControlPorLlave('ANO_C');
$anio=$control->getConsecutiv();
$control->setControlPorLlave('CICLOACT');
$ciclo_actual=$control->getConsecutiv();

$franja = new Franjas();
$franjas=$franja->getListadoFranjasCarreras($anio,$ciclo_actual);
//print_r($franjas);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="robots" content="noindex, nofollow">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico">
        <title>SIAI - Sistema de Inscripción de Asignaturas vía Internet</title>

        <!-- favicon -->
        <link rel="icon" type="image/png" href="assets/images/other_images/favicon.png">

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <!-- owl carousel css -->
        <link href="assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="assets/js/owl-carousel/owl.theme.css" rel="stylesheet">
        <link href="assets/js/owl-carousel/owl.transitions.css" rel="stylesheet">
        <!-- intro animations -->
        <link href="assets/js/wow/animate.css" rel="stylesheet">
        <!-- font awesome -->
        <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- lightbox -->
        <link href="assets/js/lightbox/css/lightbox.css" rel="stylesheet">

        <!-- styles for this template -->
        <link href="assets/css/styles.css" rel="stylesheet">

        <!-- place your extra custom styles in this file -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <!--<link href="css/general.css" rel="stylesheet" type="text/css" />-->
        <link href="css/franjas.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="background-image-overlay"></div>

        <div id="outer-background-container" data-default-background-img="assets/images/other_images/bg5.jpg" style="background-image:url(assets/images/other_images/bg5.jpg);"></div>
        <!-- end: #outer-background-container -->    

        <!-- Outer Container -->
        <div id="outer-container">

            <!-- Left Sidebar -->
            <section id="left-sidebar">

                <div class="logo">
                    <a href="#intro" class="link-scroll"><img src="assets/images/other_images/logo.png" alt="Twilli Air"></a>
                </div><!-- .logo -->

                <!-- Menu Icon for smaller viewports -->
                <div id="mobile-menu-icon" class="visible-xs" onClick="toggle_main_menu();"><span class="glyphicon glyphicon-th"></span></div>

                <ul id="main-menu">
                    <li id="menu-item-text" class="menu-item scroll"><a href="#text">Iniciar sesi&oacute;n</a></li>
                    <li id="menu-item-grid" class="menu-item scroll"><a href="#grid">Activar cuenta</a></li>
                    <li id="menu-item-carousel" class="menu-item scroll"><a href="#carousel">Tutorial</a></li>
                    <li id="menu-item-contact" class="menu-item scroll"><a href="#contact">Contacto</a></li>   
                    <li id="" class="menu-item" onclick="populate_and_open_modal(event, 'modal-content-horarios');">
                        <a href="javascript:void(0)"><i class="glyphicon glyphicon-calendar"></i> Horarios para selecci&oacute;n de materias y horarios</a>
                    </li>   
                </ul><!-- #main-menu -->

            </section><!-- #left-sidebar -->
            <!-- end: Left Sidebar -->

            <section id="main-content" class="clearfix">

                <article id="intro" class="section-wrapper clearfix" data-custom-background-img="assets/images/other_images/bg5.jpg">
                    <div class="content-wrapper clearfix wow fadeInDown" data-wow-delay="0.3s">
                        <div class="col-sm-2 col-md-3 pull-left">
                            SIAI 2.0
                            <img src="assets/images/theme_images/logo_politecnica.png" alt="Twilli Air">
                        </div>
                        <div class="col-sm-10 col-md-9 pull-right">

                            <section class="feature-text">
                                <h1>Sistema de Inscripci&oacute;n de materias en l&iacute;nea UPES</h1>
                                <p>Realiza el tr&aacute;mite desde la comodidad de tu casa.</p>
                                <p><a href="#carousel" class="link-scroll btn btn-outline-inverse btn-lg">M&aacute;s informaci&oacute;n aqu&iacute;</a></p>
                                <!--<p><a href="javasacript:void(0)" onclick="populate_and_open_modal(event, 'modal-content-horarios');" class="link-scroll btn btn-outline-inverse btn-lg">Consulta de horarios de inscripci&oacute;n</a></p>-->
                            </section>

                        </div><!-- .col-sm-10 -->
                    </div><!-- .content-wrapper -->
                </article><!-- .section-wrapper -->

                <article id="text" class="section-wrapper clearfix" data-custom-background-img="assets/images/other_images/bg1.jpg">
                    <div class="content-wrapper clearfix">
                        <div class="col-sm-10 col-md-9 pull-right">

                            <h1 class="section-title">Inicio de sesi&oacute;n</h1>

                            <form id="login" class="form-style validate-form clearfix" action="" method="POST" role="form">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="text-field form-control validate-field required" data-validation-type="string" id="form-usuario" name="usuario" placeholder="Usuario">
                                    </div> 
                                    <div class="form-group">
                                        <input type="password" class="text-field form-control validate-field required" data-validation-type="" id="form-contrasena" name="contrasena" placeholder="Contraseña">
                                    </div> 
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-outline-inverse" id="btnSesion">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .col-sm-10 -->
                    </div><!-- .content-wrapper -->
                </article><!-- .section-wrapper -->

                <article id="grid" class="section-wrapper clearfix" data-custom-background-img="assets/images/other_images/bg2.jpg">
                    <div class="content-wrapper clearfix">
                        <h1 class="section-title">Activaci&oacute;n de cuenta</h1>
                        <form id="registro" class="form-style validate-form clearfix" action="" method="POST" role="form">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" class="text-field form-control validate-field required" data-validation-type="string" id="form-carnet" name="carnet" placeholder="Carnet">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="text-field form-control validate-field required" data-validation-type="" id="form-contrasena" name="contrasena" placeholder="Contraseña">
                                </div> 
                                <div class="form-group">
                                    <input type="password" class="text-field form-control validate-field required" data-validation-type="" id="form-contrasena2" name="contrasena2" placeholder="Repetir Contraseña">
                                </div> 
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="email" class="text-field form-control validate-field required" data-validation-type="email" id="form-email" placeholder="Correo Electrónico" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-1">Día</label> 
                                    <div class="col-md-3"><select id="dia" name="dia" style="background-color: black" class="form-control">
                                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                                <option><?php echo $i; ?></option>  
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <label class="control-label col-md-1">Mes</label> 
                                    <div class="col-md-4"><select id="mes" name="mes" class="form-control" style="background-color: black" onchange="javascript: getDias();">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>                                         
                                        </select>
                                    </div>
                                    <label class="control-label col-md-1">Año</label> 
                                    <div class="col-md-2">
                                        <select id="anio" style="background-color: black" name="anio" onchange="javascript: getDias();">
                                            <?php for ($i = date('Y') - 100; $i <= date('Y'); $i++): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>   
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-12">&nbsp;</div>
                                <button type="submit" class="btn btn-sm btn-outline-inverse" id="btnSignin">Activar Cuenta</button>
                            </div>
                        </form>

                    </div><!-- .content-wrapper -->
                </article><!-- .section-wrapper -->

                <article id="carousel" class="section-wrapper clearfix" data-custom-background-img="assets/images/other_images/bg6.jpg">
                    <div class="content-wrapper clearfix">

                        <div id="features-carousel" class="carousel slide with-title-indicators max-height" data-height-percent="70" data-ride="carousel">

                            <!-- Indicators - slide navigation -->
                            <ol class="carousel-indicators title-indicators">
                                <li data-target="#features-carousel" data-slide-to="0" class="active">Video tutorial</li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="carousel-text-content">
                                        <!--<img src="assets/images/other_images/transp-image1.png" class="icon" alt="Lorem Ipsum">-->
                                        <h2 class="title"></h2>
                                        <p>Este video tutorial le explicar&aacute; c&oacute;mo utilizar el SIAI 2.0 para realizar su proceso inscripci&oacute;n de asignaturas en linea.</p>
                                        <p><a href="" onclick="populate_and_open_modal(event, 'modal-content-2');" class="btn btn-outline-inverse btn-sm">Ver video</a></p>

                                        <div class="content-to-populate-in-modal" id="modal-content-2">
                                            <video width="100%" height="100%" controls>
                                             <source src="assets/siaiAlumnos.mp4" type="video/mp4">
                                             <!--<source src="movie.ogg" type="video/ogg">-->
                                             Your browser does not support the video tag.
                                           </video> 
                                        </div><!-- #modal-content-2 -->
                                    </div>
                                </div><!-- .item -->


                            </div><!-- .carousel-inner -->
                            
                            <div class="content-to-populate-in-modal" id="modal-content-horarios">
                                <h4>Horarios para iniciar solicitud de inscripci&oacute;n</h4>
                                <div id="tabla">
                                    <table id="tbl_franjas" width="95%" style="background:#FFFFFF;" align="center" border="0" cellpadding="3" cellspacing="0" bordercolor="#999999"  >
                                        <thead>
                                            <tr>
                                                <th>Carrera</th>
                                                <th>Fecha inicial</th>
                                                <th>Fecha final</th>
                                            </tr>                                        
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($franjas as $f)
                                            {
                                                $pfi=explode('-', $f['fecha_hora_inicio']);
                                                $fi=$pfi[2].'/'.$pfi[1].'/'.$pfi[0];
                                                
                                                $pff=explode('-', $f['fecha_hora_fin']);
                                                $ff=$pff[2].'/'.$pff[1].'/'.$pff[0];                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $f['NOMBRE'];?></td>
                                                    <td><?php echo $fi;?></td>
                                                    <td><?php echo $ff;?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            
                            <!-- Controls -->

                        </div><!-- #about-carousel -->

                    </div><!-- .content-wrapper -->
                </article><!-- .section-wrapper -->

                <article id="contact" class="section-wrapper clearfix" data-custom-background-img="assets/images/other_images/bg4.jpg">
                    <div class="content-wrapper clearfix">

                        <h1 class="section-title">Contacto</h1>

                        <!-- CONTACT DETAILS -->
                        <div class="contact-detailss col-sm-12 col-md-12">
                            <p><h3>Si tiene alguna duda o sugerencia por favor utilice los siguientes datos de contacto:</h3></p>
                            <p>123A,<br/>Redondel Don Rua,<br/>San Salvador<br/></p>
                            <p>Tel: (+503) 2256-7890</p>
                            <p><a href="mailto:administradorsistemasiai@gmail.com">administradorsistemasiai@gmail.com</a></p>
                        </div>
                        <!-- END: CONTACT DETAILS -->

                    </div><!-- .content-wrapper -->
                </article><!-- .section-wrapper -->

            </section><!-- #main-content -->

            <!-- Footer -->
            <section id="footer">

                <!-- Go to Top -->
                <div id="go-to-top" onclick="scroll_to_top();"><span class="icon glyphicon glyphicon-chevron-up"></span></div>

                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/UPolitecnicaES" target="_blank" title="Facebook"><img src="assets/images/theme_images/social_icons/facebook.png" alt="Facebook"></a></li>
                    <li><a href="https://twitter.com/U_Politecnica" target="_blank" title="Twitter"><img src="assets/images/theme_images/social_icons/twitter.png" alt="Twitter"></a></li>
                     <!-- <li><a href="#" target="_blank" title="Google+"><img src="assets/images/theme_images/social_icons/googleplus.png" alt="Google+"></a></li>-->
                </ul>

                <!-- copyright text -->
                <div class="footer-text-line">&copy; SIAI 2.0</div>
            </section>
            <!-- end: Footer -->      

        </div><!-- #outer-container -->
        <!-- end: Outer Container -->

        <!-- Modal -->
        <!-- DO NOT MOVE, EDIT OR REMOVE - this is needed in order for popup content to be populated in it -->
        <div class="modal fade" id="common-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->    
        <!--        ALERTAS MODALES     -->
        <div class="content-to-populate-in-modal" id="modal-content-log-1">
            <h3>Información Incompleta</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Ingrese Usuario y Contraseña para poder iniciar sesión</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-log-2">
            <h3>Error de inicio de sesi&oacute;n</h3>
            <p><img data-img-src="assets/images/other_images/appbar.noentry.png" class="lazy rounded_border hover_effect pull-left">El usuario o la contraseña ingresada no son correctas</p>
<!--            <p><a href="">¿He olvidado mi contraseña?</a></p>-->
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-log-3">
            <h3>Inicio de Sesión</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Aun no has activado tu cuenta, busca en tu correo electrónico un mensaje con el vinculo de activación</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-log-4">
            <h3>Error de inicio de sesi&oacute;n</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Ingrese Usuario y Contraseña para poder iniciar sesión</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-1">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">La contraseña ingresada no es valida.</p>
            <p>La contraseña y la confirmación de la contraseña deben ser iguales y tener mas de 6 caracteres</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-2">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Su cuenta de usuario ha sido creada con &eacute;xito.</p>
            <p>Se ha enviado un correo con el enlace de verificación, Usted podrá iniciar sesión despues de haber realizado la verificación</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-3">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.noentry.png" class="lazy rounded_border hover_effect pull-left">Error de conexion, no se puede ingresar al Sistema de Inscripción en este momento</p>
            <p>Favor intentelo de nuevo en otro momento.</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-4">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Los datos ingresados no coinciden con los registrados por la Universidad Politécnica por lo cual no se puede confirmar su identidad.</p>
            <p>Si esta seguro que los datos ingresados son los correctos, actualice sus datos en las instalaciones de La Universidad</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-log-5">
            <h3>Fechas para inscripcion en l&iacute;nea</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Los alumnos de su carrera no pueden iniciar su solicitud de inscripci&oacute;n en esta fecha.</p>
            <p>Consulte las fechas en la que los alumnos de su carrera pueden iniciar solicitud de inscripci&oacute;n 
                <a href="javascript:void(0)" onclick="populate_and_open_modal(event, 'modal-content-horarios');"><i class="glyphicon glyphicon-calendar"></i> Aqu&iacute;</a>
            </p>       
        </div>        
        <div class="content-to-populate-in-modal" id="modal-content-sign-7">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Su usuario ya ha sido creado, pero su cuenta no ha sido activada.</p>
            <p>Revise su correo electrónico y seleccione el enlace que se le envió para terminar el proceso de activación.</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-5">
            <h3>Activación de Usuario</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">El carnet ingresado corresponde a un usuario activo en el sistema, si usted no activo esta cuenta reportelo a las autoridades de la Universidad</p>
        </div>
        <div class="content-to-populate-in-modal" id="modal-content-sign-6">
            <h3>Información Incompleta</h3>
            <p><img data-img-src="assets/images/other_images/appbar.alert.png" class="lazy rounded_border hover_effect pull-left">Ingrese todos los datos solicitados con sus formatos correspondientes para poder activar su cuenta de usuario.</p>
        </div>
        <!-- Javascripts
        ================================================== -->

        <!-- Jquery and Bootstrap JS -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Easing - for transitions and effects -->
        <script src="assets/js/jquery.easing.1.3.js"></script>

        <!-- background image strech script -->
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <!-- background image fix for IE 9 or less
           - use same background as set above to <body> -->
        <!--[if lt IE 9]>
        <script type="text/javascript">
        $(document).ready(function(){
          jQuery("#outer-background-container").backstretch("assets/images/other_images/bg5.jpg");
        });
        </script> 
        <![endif]-->  

        <!-- detect mobile browsers -->
        <script src="assets/js/detectmobilebrowser.js"></script>

        <!-- owl carousel js -->
        <script src="assets/js/owl-carousel/owl.carousel.min.js"></script>

        <!-- lightbox js -->
        <script src="assets/js/lightbox/js/lightbox.min.js"></script>

        <!-- intro animations -->
        <script src="assets/js/wow/wow.min.js"></script>

        <!-- Custom functions for this theme -->
        <script src="assets/js/functions.min.js"></script>
        <script src="assets/js/initialise-functions.js"></script>

        <script type="text/javascript" src="js/Comunes.js"></script>
        <script type="text/javascript" src="js/Sesion.js"></script>
        <script type="text/javascript" src="js/Validaciones.js"></script>
        <script type="text/javascript" src="js/md5.js"></script>

        <!-- IE9 form fields placeholder fix -->
        <!--[if lt IE 9]>
        <script>contact_form_IE9_placeholder_fix();</script>
        <![endif]--> 
    </body>
</html>