<?php
include '../Controladores/ctrlmostrarCategoria.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--header hero-->
    <link rel="stylesheet" href="../assets/CSS/carrito.css">
    <link rel="stylesheet" href="../assets/CSS/carritoContador.css">
    <link rel="stylesheet" href="../assets/CSS/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/modificarCurso.css">
    <title>MODIFICAR CURSO</title>
</head>

<body>
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
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <img src="../assets/img/www.png"
                            alt="" height="30"></button>
                </form>
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
                        <a class="nav-link" href="carrito.php" id="contador">
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
    <h1>MODIFICAR CURSOS</h1>
    <?php include '../Controladores/ctrlMostrarMisCursosCreados.php'; ?>
    <table class="container1">

        <?php foreach ($cursos as $curso) : ?>
        <tr>
            <td><img class="imagen-curso" src="../assets/img/<?php echo $curso['imagen']; ?>"
                    alt="<?php echo $curso['titulo']; ?>"></td>
            <td>
                <figcaption class="id"><?php echo $curso['id_lista_cursos']; ?></figcaption>
                <figcaption class="titulo"><?php echo $curso['titulo']; ?></figcaption>
                <figcaption class="titulo"><img src="../assets/img/etiqueta-del-precio.png" width="25px" height="25px"
                        alt=""><?php echo $curso['precio']; ?></figcaption>
            </td>
            <td>
                <form action="../Controladores/ctrlUpdateDatosCurso.php?id=<?php echo $curso['id_lista_cursos']; ?>"
                    method="post" enctype="multipart/form-data">
                    <div>
                        <form action="../Controladores/ctrlSubirVideo.php" method="post" enctype="multipart/form-data">

                            <label for="titulo">Título del curso</label>
                            <input type="text" name="titulo" id="titulo" required>

                            <div class="drag-drop-area">
                                <p>Arrastra y suelta una imagen aquí</p>
                                <input type="file" name="foto" id="foto" required accept="image/*" multiple="false">
                            </div>

                            <br><br>
                            <label for="titulo">Precio</label>
                            <input type="text" name="precio" id="precio" required>
                            <br><br>

                            <label for="categorias">Selecciona una categoría:</label>
                            <select name="categoria" id="categoria">
                                <?php foreach ($categoria as $curso) : ?>
                                <option value="<?php echo $curso['id_categoria']; ?>"><?php echo $curso['categoria']; ?>
                                </option>
                                <?php endforeach; ?>
                                <br><br>
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="ACTUALIZAR">
                    </div>
                </form>
                <BR></BR>
                <!--<div><a class="Comprar" style="text-decoration:none"
                        href="?id=<?php echo $curso['id_lista_cursos']; ?> ">ACTUALIZAR VALORES</a></div>-->
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
<script>
// Verificar si hay un parámetro 'success' en la URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('Update')) {
    // Mostrar una alerta
    alert("Actualización exitosa");

    // Redirigir al usuario después de mostrar la alerta
    window.location.href = "modificarCurso.php"; // Cambiar 'nueva-pagina.html' a tu URL de destino
}
</script>

</html>