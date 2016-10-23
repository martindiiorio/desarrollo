<?php require_once("registro.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icono title-->
    <link rel="icon" href="img/title.icon.jpg" sizes="16x16">
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css.libraries/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/glyphicons-halflings-regular.woff2">
    <!-- Google Fonts LATO BOLD-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/googleFonts.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>dóndeDuele</title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container" id="pageTop_anchor">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span class="glyphicon glyphicon-home"></span>    dóndeDuele</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Mi Médico</a></li>
                    <li><a href="#">Tutorial</a></li>
                    <li><a id="faq" href="#"><span class=""></span> Preguntas</a></li>
                    <li><a href="#">Contacto</a></li>
                    <?php if (!$auth->estaLogueado()) { ?>
                      <li><a id="signin" href="#"><span class="glyphicon glyphicon-user;"></span> Registrese</a></li>
                      <li><a id="login" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } else { ?>
                      <li><a id="logout" href="#"><span class="glyphicon glyphicon-log-out"></span>Logout <?php echo $nombre ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Registro-->
    <div class="modal fade" id="myModalSignIn" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-user"></span> Registrese</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form id="signinForm" class="section-form" method="post" action="index.php">
                        <div class="form-group">
                          <?php if (!empty($errores)) { ?>
                    				<div style="width:300px;background-color:red">
                    					<ul>
                    						<?php foreach ($errores as $error) { ?>
                    							<li>
                    								<?php echo $error ?>
                    							</li>
                    						<?php } ?>
                    					</ul>
                    				</div>
                    			<?php } ?>
                        </div>
                        <div class="form-group">
                            <!-- nombre -->
                            <label for="nombre" class="control-label" name="name">Nombre</label>
                            <input type="text" class="form-control" id="nombre_1" name="nombre" placeholder="nombre">
                        </div>
                        <div class="form-group">
                            <!-- email -->
                            <label for="email" class="control-label" name="e-mail">Dirección de Correo Electrónico</label>
                            <input type="text" class="form-control" id="email_id" name="email" placeholder="juan@perez.com.ar">
                        </div>

                        <div class="form-group">
                            <!-- contraseña 1 -->
                            <label for="pass1" class="control-label" name="pass">Contraseña</label>
                            <input type="password" class="form-control" id="pass_1" name="pass1" placeholder="contraseña">
                        </div>

                        <div class="form-group">
                            <!-- contraseña 2 -->
                            <label for="pass2" class="control-label" name="cpass">Confirme Contraseña</label>
                            <input type="password" class="form-control" id="pass_2" name="pass2" placeholder="confirmacion de contraseña">
                        </div>

                        <div class="form-group">
                            <!-- Submit Button -->
                            <input type="submit" id="submitBtn" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>

        </div>
    </div>

    <!--modal de FAQ-->
    <div class="modal fade" id="myModalFAQ" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="faqTitleModal"><span class=""></span> Preguntas Frecuentes</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div class="panel-group" id="colapsador">
                        <div class="panel panel-default align_glyph">
                            <i class="fa fa-comments glyph_icon"></i>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <a class="faqItems faqTitle" href="#collapse1" data-toggle="collapse" data-parent="#colapsador">
                                        Pregunta 1
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse1">
                                    <div class="panel-body faqItems faqBody">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default align_glyph">
                            <i class="fa fa-comments glyph_icon"></i>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <a class="faqItems faqTitle" href="#collapse2" data-toggle="collapse" data-parent="#colapsador">
                                        Pregunta 2
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse2">
                                    <div class="panel-body faqItems faqBody">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default align_glyph">
                            <i class="fa fa-comments glyph_icon"></i>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <a class="faqItems faqTitle" href="#collapse3" data-toggle="collapse" data-parent="#colapsador">
                                        Pregunta 3
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse3">
                                    <div class="panel-body faqItems faqBody">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default align_glyph">
                            <i class="fa fa-comments glyph_icon"></i>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <a class="faqItems faqTitle" href="#collapse4" data-toggle="collapse" data-parent="#colapsador">
                                        Pregunta 4
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse4">
                                    <div class="panel-body faqItems faqBody">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default align_glyph">
                            <i class="fa fa-comments glyph_icon"></i>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <a class="faqItems faqTitle" href="#collapse5" data-toggle="collapse" data-parent="#colapsador">
                                        Pregunta 5
                                    </a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse5">
                                    <div class="panel-body faqItems faqBody">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Login-->
    <div class="modal fade" id="myModalLogIn" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-log-in"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="index.php">
                        <div class="form-group">
                            <label for="usrnameLogin"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" class="form-control" name="usrnameLogin" id="usrnameLogin" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="pswLogin"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" name="pswLogin" id="pswLogin" placeholder="Enter password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" name="recordame" checked>Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#">Sign Up</a></p>
                    <p>Forgot <a href="#">Password?</a></p>
                </div>
            </div>

        </div>
    </div>

    <div class="homepage-hero-module">
        <div class="video-container">
            <div class="filter"></div>
            <video autoplay loop class="fillWidth">
                <source src="img/Walk-The-Dog.mp4" type="video/mp4">
            </video>
            <section class="section-home" id="section_anchor">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center home-titulo ">Buscá tu Médico</h1>
                        </div>
                        <div class="col-md-12">
                            <form class="form-inline text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="form-group form-elementos">
                                            <select class="form-control form-elementos">
                                                <option hidden>Privado o por Pregaga </option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="form-group form-elementos">
                                            <select class="form-control form-elementos">
                                                <option hidden>Especialista</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="form-group form-elementos">
                                            <input type="text" class="form-control form-elementos search-query" id="exampleInputEmail2" placeholder="Ingresá Zona, Ciudad o Provincia">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <div class="form-elementos">
                                            <button type="submit" class="btn btn-warning form-elementos">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="poster hidden">
                <img src="img/Walk-The-Dog.jpg" alt="">
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModalAviso" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Aviso de privacidad</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <div class="panel-group" id="colapsa">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a class="" href="#privacidad_1" data-toggle="collapse" data-parent="#colapsador">
                                      Aviso de Privacidad México
                                  </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="privacidad_1">
                                        <div class="panel-body">
                                            <p>

                                            </p>RESPONSABLE DE LA PROTECCIÓN DE SUS DATOS PERSONALES: Mediconnect Health México, S.A.P.I. de C.V, con domicilio Calle Fuentes de Ceres, Número 4, Código Postal 52780, Colonia Lomas de Tecamachalco, Municipio
                                            Huixquilucan, Estado de México, es responsable de recabar sus datos personales, del uso que se le dé a los mismos y de su protección.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a class="" href="#privacidad_2" data-toggle="collapse" data-parent="#colapsador">
                                      Pregunta 2
                                  </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="privacidad_2">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a class="" href="#privacidad_3" data-toggle="collapse" data-parent="#colapsador">
                                      Pregunta 3
                                  </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="privacidad_3">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <!-- footer -->

    <footer class="footer2">
        <div class="container zocalo">
            <p>
                2016 © Virtua Consult Health Inc. Todos los derechos reservados. <a class="pointer" data-toggle="modal" data-target="#myModalAviso">Aviso de Privacidad</a>
            </p>
        </div>

    </footer>
    <!-- footer cierre-->

    <!-- Jquery -->
    <script src="assets/js.libraries/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="assets/js.libraries/bootstrap.min.js"></script>
    <!-- JQuery Validate -->
    <script src="assets/js.libraries/jquery.validation.v1.15.1.js"></script>
    <!-- modalesJS -->
    <script type="text/javascript" src="js/modals.js"></script>
    <!-- scrollerJS: removido hasta arreglar el infinite scroll -->
    <!--<script type="text/javascript" src="js/scroller.js"></script>-->
    <!-- Validacion del registro -->
    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript" src="js/coverr.js"></script>

    <?php if ($_POST["pass2"] && !$auth->estaLogueado()) { ?>
      <script> $("#myModalSignIn").modal(); </script>
    <?php } ?>


</body>



</html>
