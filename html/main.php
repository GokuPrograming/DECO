<?php
// Incluye el archivo mostrar_cursos.php
include '../Controladores/crlMostrar.php';
include '../Controladores/ctlFavoritos.php';
include '../Controladores/ctlCarrito.php';

?>
<!DOCTYPE html>
<html lang="en" class="backblavk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--header hero-->
    <link rel="stylesheet" href="../assets/CSS/carrito.css">
    <link rel="stylesheet" href="../assets/CSS/carritoContador.css">
    <link rel="stylesheet" href="../assets/CSS/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--mostrar productos v2-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/CSS/c2.css">


    <script>
    $(document).ready(function() {
        $.ajax({
            url: "../Controladores/ctlCarritoCo0ontador.php", // Ruta al archivo de servidor
            type: "GET",
            success: function(data) {
                $("#contador-value").text("" + data); // Muestra el valor en la barra de navegación
            }
        });
    });
    </script>

    <title>Principal</title>
</head>
<!--https://codepen.io/allan-medina/pen/yLVLvGK -->

<body class="backblavk">
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
                        <a class="nav-link" href="#"><img src="../assets/img/work-from-home.png" alt="" height="30">
                            Inicio <span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <img src="../assets/img/www.png"
                            alt="" height="30"></button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../html/p2.php"><img src="../assets/img/hombre.png" alt=""
                                height="30"></a>
                        <a href="SubirVideo.html">SUBIR VIDEOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/configuracion.html"><img
                                src="../assets/img/configuraciones.png" alt="" height="30"></a>
                    </li>
                    <li class="nav-item">

                        <!-- <a class="nav-link" href="carrito.php" id="contador"><img src="../assets/img/work-from-home.png" alt=""
                                height="30">
                        </a>-->
                        <a class="nav-link" href="carrito.php" id="contador">contador
                            <div class="carrito-container">
                                <img src="../assets/img/carrito-de-compras.png" alt="" height="30">
                                <!--el contador value se usa mas que nada el value para obtener los valores del id que se llama contador-->
                                <span id="contador-value"></span>
                            </div>
                        </a>
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
    <!-- muestra de videos -->
    <section class="secao_destaque">
        <div class="container">
            <figure class="secao_destaque_imagem_destaque"><img src="https://i.postimg.cc/Sxzkj0qd/yesterday.png"
                    alt="FILMES ONTEM DESTAQUE"></figure>
            <article class="secao_descricao_destaque">
                <h1>En demanda</h1>
                <p></p>
            </article>
            <div class="secao_assistir_saiba_mais">
                <a href="#">Empezar</a>
                <a href="#">Guardar</a>
            </div>
        </div>
    </section>
    <!-- //////////////////////////////////////// -->
    </div>
    <!--Mostrar Cosas nuevo item-->
    <!-- Titulo -->
    <h1 class='display-3 text-center titulo-sc p-3 p-md-5'>Todos los productos</h1>
    <!-- Breadcrumb -->
    <!-- Productos -->
    <div class="container" id="app">
        <div class="row align-items-start">
            <?php foreach ($cursos as $curso) : ?>
            <div class="col-6 col-md-4 col-lg-3 p-2 p-md-3 padre" v-for="(item, index) of productos">
                <span class="link-tarjeta">
                    <div class="curso-card">
                        <!-- Nuevo div para aplicar la animación -->
                        <img src="../assets/img/<?php echo $curso['imagen']; ?>" class="img opacity" width="25px"
                            height="25px" alt="<?php echo $curso['titulo']; ?>" loading="lazy">
                        <img src="../assets/img/<?php echo $curso['imagen']; ?>" class="img" loading="lazy">
                        <div class="separador">
                            <a class="Comprar"
                                href="../Controladores/ctlFavoritos.php?id=<?php echo $curso['id_lista_cursos']; ?>"><img
                                    src="../assets/img/favorito.png" width="25px" height="25px"> </a>
                            <a class="Comprar"
                                href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>"><img
                                    src="../assets/img/etiqueta-del-precio.png" width="25px" height="25px"></a>
                            <a class="Comprar"
                                href="../Controladores/ctlAgregarAcarrito.php?id=<?php echo $curso['id_lista_cursos']; ?>"><img
                                    src="../assets/img/carrito-de-compras.png" width="25px" height="25px"></a>
                        </div>
                        <p class="display-1 pt-2 nombre-pro"><?php echo $curso['titulo']; ?></p>
                        <p class="cat-origen pb-1">Precio=<?php echo $curso['precio']; ?></p>
                        <hr class="m-0 p-0">
                    </div>
                </span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- muestra de manera automatica todos los curosos para poderlos visualizar -->
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>Cursos Totales</h2>
            <ul class="em_alta">
                <?php foreach ($cursos as $curso) : ?>
                <li>
                    <figure>
                        <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px"
                            alt="<?php echo $curso['titulo']; ?>">

                        <div class="curso-container">
                            <div>
                                <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                            </div>
                            <div>
                                <figcaption class="">Precio=<?php echo $curso['precio']; ?></figcaption>
                            </div>
                            <div>
                                <form action="" method="post">
                                    <a
                                        href="../Controladores/ctlFavoritos.php?id=<?php echo $curso['id_lista_cursos']; ?>">Favoritos</a>
                                    <a
                                        href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>
                                    <a
                                        href="../Controladores/ctlAgregarAcarrito.php?id=<?php echo $curso['id_lista_cursos']; ?>">Agregar
                                        a carrito</a>
                                </form>
                            </div>
                        </div>

                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>



    <?php include '../Controladores/ctrlMostrarComprados.php'; ?>
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>Comprados</h2>
            <ul class="em_alta">

                <?php foreach ($cursos as $curso) : ?>
                <li>
                    <figure>
                        <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px"
                            alt="<?php echo $curso['titulo']; ?>">

                        <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>

                        <figcaption class=""><?php //echo $curso['id_lista_cursos']; 
                                                    ?></figcaption>
                        <div>
                            <form action="" method="post">
                                <a
                                    href="../Controladores/ctlFavoritos.php?id=<?php echo $curso['id_lista_cursos']; ?>">Favoritos</a>
                            </form>

                        </div>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <section>

        <table class="container1">
            <?php include '../Controladores/ctlMostrarFav.php'; ?>
            <?php foreach ($cursos as $cursoa) : ?>
            <tr>
                <td><img src="../assets/img/<?php echo $cursoa['imagen']; ?>" alt="<?php echo $cursoa['titulo']; ?>">
                </td>
                <td>
                    <figcaption class="titulo"><?php echo $cursoa['titulo']; ?></figcaption>
                    <figcaption><?php //echo $curso['id_lista_cursos']; 
                                    ?></figcaption>
                    <!--  <figcaption class="titulo"><img src="../assets/img/etiqueta-del-precio.png" width="25px"
                            height="25px" alt=""><?php echo $cursoa['precio']; ?></figcaption>-->
                </td>
                <td>
                    <div class=""><a class="quitar" style="text-decoration:none"
                            href="../Controladores/CtlEliminarFavoritos.php?id=<?php echo $cursoa['id_lista_cursos']; ?>">Quitar
                            De favoritos</a>
                    </div>
                </td>
                <td>
                    <div>
                        <a class="Comprar" style="text-decoration:none"
                            href="../Controladores/ctlcompras.php?id=<?php echo $cursoa['id_lista_cursos']; ?>">Comprar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>


    <section class="secao_lista_filmes">
        <?php include '../Controladores/ctlMostrarFav.php'; ?>
        <div class="container">
            <h2>Los favoritos</h2>
            <ul class="em_alta">
                <?php $first = true; // Variable para rastrear el primer elemento 
                ?>
                <?php foreach ($cursos as $curso) : ?>
                <li>
                    <figure>
                        <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px"
                            alt="<?php echo $curso['titulo']; ?>">
                        <figcaption><?php echo $curso['titulo']; ?></figcaption>
                        <figcaption><?php echo $curso['id_lista_cursos']; ?></figcaption>
                        <div>
                            <a
                                href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>
                            <a
                                href="../Controladores/CtlEliminarFavoritos.php?id=<?php echo $curso['id_lista_cursos']; ?>">Eliminar
                                de la lista de Favoritos</a>
                        </div>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>


    <?php include '../Controladores/ctlCarrito.php'; ?>

    <section class="secao_lista_filmes">
        <div class="container">

            <h2>Los del carrito</h2>
            <ul class="em_alta">
                <?php foreach ($usuariosCarrito as $curso) : ?>
                <li>
                    <figure>
                        <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px"
                            alt="<?php echo $curso['titulo']; ?>">
                        <figcaption><?php echo $curso['titulo']; ?></figcaption>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
            <a href="carrito.php">Ir a carrito</a>
        </div>
    </section>




    <section class="secao_lista_filmes">
        <div class="container">
            <h2>CONTINUAR ASSISTINDO</h2>
            <ul class="continuar_assistindo nav-item active">
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/NF88YGfn/THE-WITCHER.png" alt="THE WITCHER">
                        <figcaption>Filme 1</figcaption>
                    </figure>
                </li>
                <li class="nav-item active">
                    <figure>
                        <img src="https://i.postimg.cc/bJ9dwZk1/THE-WALKING-DEAD.png" alt="THE WALKING DEAD">
                        <figcaption>Filme 2</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/PxXTK2v8/O-RESGATE-DO-SOLDADO-RYAN.png"
                            alt="O RESGATE DO SOLDADO RYAN">
                        <figcaption>Filme 3</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/J7JCJf2d/DAWSON-S-CREEK.png" alt="DAWSON'S CREEK">
                        <figcaption>Filme 4</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </section>
    <!--  -->

    <br>

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
                                <p>"Empoderamos tu potencial a través del aprendizaje en línea, impulsando tu éxito
                                    y
                                    transformando tu futuro, porque el conocimiento no tiene límites ni fronteras.
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
                                <p>No olvides que este es tu santuario de conocimiento y siempre serás bienvenido
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