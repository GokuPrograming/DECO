<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/carrito.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "../Controladores/ctrlTotalCarrito.php", // Ruta al archivo de servidor
            type: "GET",
            success: function(data) {
                $("#pagar-value").text("" + data); // Muestra el valor en la barra de navegación
            }
        });
    });
    </script>
    <title>Carrito</title>

</head>

<body>
    <?php include '../Controladores/ctlCarrito.php'; ?>


    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="../assets/img/OIG.jpeg" alt="Logo" width="80" height="80"
                class="d-inline-block align-top imagen-redondeada">
            <a class="navbar-brand" href="#"><img height="100" src="/HTML/Carpeta2/assets/imagenes/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="main.php"><img src="../assets/img/work-from-home.png" alt="" height="30">
                            Inicio <span class="sr-only">(current)</span></a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../html/p2.php"><img src="../assets/img/hombre.png" alt=""
                                height="30"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SubirVideo.html"><img src="../assets/img/subir.png" alt="subir"
                                height="30px"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/configuracion.html"><img
                                src="../assets/img/configuraciones.png" alt="" height="30"></a>
                    </li>
                    <li class="nav-item">

                        <!-- <a class="nav-link" href="carrito.php" id="contador"><img src="../assets/img/work-from-home.png" alt=""
                                height="30">
                        </a>-->

                    </li>

                    <li class="nav-item active">

                        <a class="nav-link" href="../Controladores/ctrlCerrarSesion.php"><img
                                src="../assets/img/flecha.png" alt="" height="30">
                            cerraar sesion <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <header class="cheader">
        <h1>CARRITO <img src="../assets/img/carrito-de-compras.png" width="50px" height="auto"></h1>
        <div><a href="../html/main.php"><img src="../assets/img/izquierda.png" alt="" width="50px" height="auto"></a>
        </div>
    </header>

    <table class="container1">

        <?php foreach ($usuariosCarrito as $curso) : ?>
        <tr>
            <td><img src="../assets/img/<?php echo $curso['imagen']; ?>" alt="<?php echo $curso['titulo']; ?>"></td>
            <td>
                <figcaption class="titulo"><?php echo $curso['titulo']; ?></figcaption>
                <figcaption class="titulo"><img src="../assets/img/etiqueta-del-precio.png" width="25px" height="25px"
                        alt=""><?php echo $curso['precio']; ?></figcaption>
            </td>
            <td>
                <div><a class="quitar" style="text-decoration:none"
                        href="../Controladores/ctrlBorrarCarrito.php?id=<?php echo $curso['id_lista_cursos']; ?> ">Quitar
                        Elemento del Carrito</a></div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="container1">
        <p>TOTAL A PAGAR=<span id="pagar-value"></span></p>
        <a class="Comprar" href="../Controladores/ComprasCarrito.php"><img src="../assets/img/tarjeta-de-debito.png"
                alt=""> COMPRAR </a>

    </div>
    </main>
    <footer class="footer-section">
        <div class="container1">
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
                                <a href="../index.html"><img src="../assets/img/OIG.jpeg" class="img-fluid"
                                        alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>"Empoderamos tu potencial a través del aprendizaje en línea, impulsando tu éxito y
                                    transformando tu futuro, porque el conocimiento no tiene límites ni fronteras. Únete
                                    a nuestra comunidad de estudiantes y descubre un mundo de posibilidades educativas
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
                                <li><a href="#">Home</a></li>
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
                                <p>No olvides que este es tu santuario de conocimiento y siempre serás bienvenido</p>
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
            <div class="container1">
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
                                <li><a href="#">Home</a></li>
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
    <script>
    // Verificar si hay un parámetro 'success' en la URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('CarritoVacio')) {
        // Mostrar una alerta
        alert("No hay cursos en el carrito. Agregue cursos antes de comprar");

        // Redirigir al usuario después de mostrar la alerta
        window.location.href = "main.php"; // Cambiar 'nueva-pagina.html' a tu URL de destino
    }
    if (urlParams.has('Quitar')) {
        // Mostrar una alerta
        alert("¡Curso del carrito eliminado!");

        // Redirigir al usuario después de mostrar la alerta
        window.location.href = "carrito.php"; // Cambiar 'nueva-pagina.html' a tu URL de destino
    }
    </script>
</body>

</html>