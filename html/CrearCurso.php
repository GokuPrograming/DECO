<?php
include '../Controladores/ctlCreacionCurso.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Registro de Curso</title>
</head>

<body>
    <h1>Registro de Curso</h1>
    <form action="procesar_registro_curso.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título del Curso</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="imagen">Imagen del Curso</label>
        <input type="file" name="imagen" id="imagen" required>

        <label for="precio">Precio del Curso</label>
        <input type="text" id="precio" required>

        <label for="id_categoria">Categoría del Curso</label>
        <select name="id_categoria" id="id_categoria" required>
            <ul>
                <?php require '../Controladores/ctlCreacionCurso.php'; ?>
                <?php foreach ($categorias as $categoria) : ?>
                <li><?php echo $categoria['categoria']; ?></li>
                <?php endforeach; ?>
            </ul>
        </select>

        <label for="id_video">ID del Video</label>
        <select name="id_video" id="id_video" required>
            <?php
            $videos = $dbHandler->obtenerVideos();

            foreach ($videos as $id => $nombre) {
                echo '<option value="' . $id . '">' . $nombre . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Guardar">
    </form>


    <?php include '../Controladores/ctlCreacionCurso.php'; ?>
    <section class="secao_lista_filmes">
        <div class="container">
            <h2>Comprados</h2>
            <ul class="em_alta">

                <?php foreach ($categoria as $curso) : ?>
                <li>
                    <figure>
                        <figcaption class=""><?php echo $curso['categoria']; ?></figcaption>
        </div>
        </figure>
        </li>
        <?php endforeach; ?>
        </ul>
        </div>
    </section>
</body>

</html>