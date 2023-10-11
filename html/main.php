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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/main.css">
    <title>Document</title>
</head>
<!--https://codepen.io/allan-medina/pen/yLVLvGK -->

<body class="backblavk">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="../assets/img/OIG.jpeg" alt="Logo" width="80" height="80" class="d-inline-block align-top imagen-redondeada">
            <a class="navbar-brand" href="#"><img height="100" src="/HTML/Carpeta2/assets/imagenes/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <img src="../assets/img/www.png" alt="" height="30"></button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../html/p2.php"><img src="../assets/img/hombre.png" alt="" height="30"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/configuracion.html"><img src="../assets/img/configuraciones.png" alt="" height="30"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="html/reproduccion.html"><img src="../assets/img/reproduce-el-video.png" alt="" height="30"></a>
                    </li>
                    <li class="nav-item active">

                        <a class="nav-link" href="../modelos/cerrarSesion.php"><img src="../assets/img/flecha.png" alt="" height="30">
                            cerraar sesion <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- muestra de videos -->
    <section class="secao_destaque">
        <div class="container">
            <figure class="secao_destaque_imagem_destaque"><img src="https://i.postimg.cc/Sxzkj0qd/yesterday.png" alt="FILMES ONTEM DESTAQUE"></figure>
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
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>CONTINUAR ASSISTINDO</h2>
            <ul class="continuar_assistindo">

            </ul>
        </div>
    </section>

    <!-- muestra de manera automatica todos los curosos para poderlos visualizar -->
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>Cursoso Totales</h2>
            <ul class="em_alta">

                <?php foreach ($cursos as $curso) : ?>
                    <li>
                        <figure>
                            <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px" alt="<?php echo $curso['titulo']; ?>">

                            <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                            <figcaption class=""><?php echo $curso['id_lista_cursos']; ?></figcaption>
                            <figcaption class=""><?php echo $curso['precio']; ?></figcaption>
                            <div>
                                <form action="" method="post">
                                    <a href="../Controladores/ctlFavoritos.php?id=<?php echo $curso['id_lista_cursos']; ?>">Favoritos</a>
                                    <a href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>
                                    <a href="../Controladores/ctlAgregarAcarrito.php?id=<?php echo $curso['id_lista_cursos']; ?>">agregar
                                        a carrito</a>
                                </form>

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
                            <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px" alt="<?php echo $curso['titulo']; ?>">

                            <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                            <figcaption class=""><?php echo $curso['id_lista_cursos']; ?></figcaption>

                            <div>
                                <form action="" method="post">
                                    <button class="boton_favorito">Favorito</button>
                                    <a href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>

                                </form>

                            </div>
                        </figure>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>



    <section class="secao_lista_filmes">
        <?php include '../Controladores/ctlMostrarFav.php'; ?>
        <div class="container">
            <h2>los favoritos</h2>
            <ul class="em_alta">

                <?php foreach ($cursos as $curso) : ?>
                    <li>
                        <figure>
                            <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px" alt="<?php echo $curso['titulo']; ?>">

                            <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                            <figcaption class=""><?php echo $curso['id_lista_cursos']; ?></figcaption>

                            <div>
                                <form action="" method="post">
                                    <button class="boton_favorito">Favorito</button>
                                    <a href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>

                                </form>

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

            <h2>los del carrito</h2>
            <ul class="em_alta">
                <?php foreach ($usuariosCarrito as $curso) : ?>
                    <li>
                        <figure>
                            <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="50px" height="50px" alt="<?php echo $curso['titulo']; ?>">
                            <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                            <div>
                                <form action="" method="post">

                                    <!--
                                <a
                                    href="../Controladores/ctlcompras.php?id=<?php echo $curso['id_lista_cursos']; ?>">Comprar</a>-->
                                </form>
                            </div>
                        </figure>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="carrito.php">ir a carrito</a>
        </div>
    </section>
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>CONTINUAR ASSISTINDO</h2>
            <ul class="continuar_assistindo">
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/NF88YGfn/THE-WITCHER.png" alt="THE WITCHER">
                        <figcaption>Filme 1</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/bJ9dwZk1/THE-WALKING-DEAD.png" alt="THE WALKING DEAD">
                        <figcaption>Filme 2</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://i.postimg.cc/PxXTK2v8/O-RESGATE-DO-SOLDADO-RYAN.png" alt="O RESGATE DO SOLDADO RYAN">
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
    <main>
        <!--Areas de especializacion-->
        <section class="row">
            <!--article*4>div.columna>img-->
            <article class="col-md-3">
                <div class="columna">
                    <img class="imgAreas fire" src="../assets/img/desarrollador-web.jpg" alt="Redes de computadoras">
                    <figcaption>REDES DE COMPUTADORAS</figcaption>
                    <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, fugiat? Commodi fuga
                            eos
                            sed nisi
                            repellendus aperiam, neque vero. Minima ipsum obcaecati, natus nemo beatae deleniti
                            nulla
                            illo ullam
                            exercitationem.</span></p>
                    <!--alt es una tool TiTle Text-->
                </div>
            </article>
            <article class="col-md-3">
                <div class="columna">
                    <img class="imgAreas fire" src="../assets/img/desarrollador-web.jpg" alt="Internet de las cosas">
                    <figcaption> Internet de las cosas</figcaption>
                    <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ut voluptatum unde
                            dolor,
                            officia
                            ipsam officiis. Praesentium nostrum corporis, iste perspiciatis aliquam ea natus totam
                            consequuntur iure
                            nisi molestias magnam.</span></p>
                </div>
            </article>
            <article class="col-md-3">
                <div class="columna">
                    <!--p>norem*2   para hace rla etiqueta de spam-->
                    <img class="imgAreas fire" src="../assets/img/desarrollador-web.jpg" alt="Base de Datos">
                    <figcaption>Base de datos</figcaption>
                    <p><span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aspernatur non nam
                            accusamus ipsa
                            sapiente perferendis tempora quis maiores excepturi officiis, harum repudiandae sint
                            autem,
                            deleniti
                            facilis minima labore mollitia!</span></p>
                </div>
            </article>
            <article class="col-md-3">
                <div class="columna">
                    <img class="imgAreas fire" src="../assets/img/desarrollador-web.jpg" alt="Arquitectura de computadores">
                    <figcaption>Arquitectura</figcaption>
                    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit dignissimos sint
                            accusamus vel
                            vero corporis ducimus eum veniam. Reiciendis provident repellendus repellat veritatis
                            laboriosam tenetur
                            vitae, ullam nesciunt aliquid! Optio?</span></p>
                </div>
            </article>
        </section>

        <!--cusrsos-->
        <section class="row">
            <div class="curso_columna col-md-6">
                <img src="../assets/img/desarrollador-web.jpg" alt="">
                <div class="info_curso">
                    <h3>estructura de datos</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est vero alias aperiam corporis
                        iste?
                        Sunt,
                        asperiores, illo cupiditate ad laboriosam quisquam eius nihil expedita voluptate, voluptates
                        alias magni
                        totam dolorem?</p>
                </div>
            </div>
            <div class="curso_columna col-md-6">
                <img src="assets/imagenes/Abstract-patterns-light_1920x1080.jpg" alt="">
                <div class="info_curso">
                    <h3>Automatas</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita in sint adipisci,
                        incidunt,
                        obcaecati pariatur, amet est ea aliquid velit numquam quidem unde voluptatum sapiente atque
                        nostrum voluptate. Aliquam, provident.</p>
                </div>
            </div>
            <div class="curso_columna col-md-6">
                <img src="assets/imagenes/OIP.jpeg" alt="">
                <div class="info_curso">
                    <h3>Programacion web</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates ad iusto ipsam
                        blanditiis
                        quia perferendis aliquam assumenda dolore rerum voluptatibus, error, quam exercitationem
                        recusandae repellat, totam consectetur. Nam, distinctio! Iure!</p>
                </div>
            </div>
            <div class="curso_columna col-md-6">
                <img src="assets/imagenes/OIP.jpeg" alt="">
                <div class="info_curso">
                    <h3>Mobiles</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde eaque amet, sed, debitis
                        architecto, sint alias similique est nemo at veniam tenetur optio exercitationem! Tempora
                        molestiae ullam magni mollitia. Atque!</p>
                </div>
        </section>
    </main>
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
                                <a href="#"><img src="../assets/img/facebook.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/gorjeo.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/instagram.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
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
                            <p>Copyright &copy; 2018, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a></p>
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