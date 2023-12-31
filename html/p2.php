<?php
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';
require_once '../Controladores/crlPerfil.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    $userID = $auth->getUserId();
    
    // Crea una instancia de la clase Perfil y pasa el ID del usuario como argumento
    $perfil = new Perfil($userID);
    $datos = $perfil->obtenerNombre();
    // Luego, puedes obtener los usuarios
    $usuarios = $perfil->obtenerNombre();
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    $auth->redirectToLogin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/p2.css">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!--header hero-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="../assets/img/OIG.jpeg" alt="Logo" width="80" height="80"
                class="d-inline-block align-top imagen-redondeada">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../html/main.php"><img src="../assets/img/work-from-home.png" alt=""
                                height="30">
                            Inicio <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../html/configuracion.html"><img
                                src="../assets/img/configuraciones.png" alt="" height="30"></a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                        <h2>ID: <?php echo $datos['id_usuario']; ?></h2>
                            <h2>Nombre: <?php echo $datos['nombre']; ?></h2>
                            <h2>Primer Apellido: <?php echo $datos['primer_apellido']; ?></h2>

                            <li>Segundo Apellido: <?php echo $datos['segundo_apellido']; ?></li>
                            <li>CURP: <?php echo $datos['curp']; ?></li>
                            <li>RFC: <?php echo $datos['rfc']; ?></li>
                            <li>Localidad: <?php echo $datos['localidad']; ?></li>
                            <li>Fecha de Nacimiento: <?php echo $datos['fecha_nacimiento']; ?></li>
                            <li>Correo: <?php echo $datos['correo']; ?></li>
                            <p><strong>About: </strong> </p>
                            <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new
                                things. </p>
                            <p><strong>Skills: </strong>
                                <span class="tags">html5</span>
                                <span class="tags">css3</span>
                                <span class="tags">jquery</span>
                                <span class="tags">bootstrap3</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <figure>
                                <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png"
                                    alt="" class="img-circle img-responsive">
                                <figcaption class="ratings">
                                    <p>Ratings
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star-o"></span>
                                        </a>
                                    </p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 divider text-center">
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong> 20,7K </strong></h2>
                            <p><small>Followers</small></p>
                            <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow
                            </button>
                        </div>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong>245</strong></h2>
                            <p><small>Following</small></p>
                            <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile
                            </button>
                        </div>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong>43</strong></h2>
                            <p><small>Snippets</small></p>
                            <div class="btn-group dropup btn-block">
                                <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options
                                </button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu text-left" role="menu">
                                    <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a>
                                    </li>
                                    <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a
                                            list </a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for
                                            spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>UBICACION</h4>
                                <span>Avenida Tecnologico</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Contactanos</h4>
                                <span>+52 4111549487</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Correo</h4>
                                <span>deco.tecno@itcelaya.edu.mx</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="../assets/img/OIG.jpeg" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>"Empoderamos tu potencial a través del aprendizaje en línea, impulsando tu
                                    éxito
                                    y
                                    transformando tu futuro, porque el conocimiento no tiene límites ni
                                    fronteras.
                                    Únete
                                    a nuestra comunidad de estudiantes y descubre un mundo de posibilidades
                                    educativas
                                    desde la comodidad de tu hogar."</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><img src="../assets/img/facebook.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/gorjeo.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/instagram.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="/index.html">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>SIGUENOS</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>No olvides que este es tu santuario de conocimiento y siempre serás
                                    bienvenido
                                </p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2018, All Right Reserved <a
                                    href="https://codepen.io/anupkumar92/">Anup</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>