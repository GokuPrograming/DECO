<?php
include '../Controladores/ctrlmostrarCategoria.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/modificarCurso.css">
    <title>MODIFICAR CURSO</title>
</head>

<body>
    <h1>MODIFICAR CURSOS</h1>
    <?php include '../Controladores/ctrlMostrarMisCursosCreados.php'; ?>
    <table class="container1">

        <?php foreach ($cursos as $curso) : ?>
        <tr>
            <td><img class="imagen-curso" src="../assets/img/<?php echo $curso['imagen']; ?>" alt="<?php echo $curso['titulo']; ?>"></td>
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

            <td>
                <div><a class="quitar" style="text-decoration:none"
                        href="?id=<?php echo $curso['id_lista_cursos']; ?> ">Quitar
                        Elemento del Carrito</a></div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>