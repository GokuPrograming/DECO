<?php
include '../Controladores/ctrlmostrarCategoria.php';
include '../Controladores/ctrlMostrarVideos.php';
?> 
<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Registro de Curso</title>
</head>

<body>
    <h1>crear Curso</h1>
    <form action="../Controladores/ctlCreacionCurso.php" method="post" enctype="multipart/form-data">
        <div>
            <!-- <form action="../Controladores/ctrlSubirVideo.php" method="post" enctype="multipart/form-data">-->
            <label for="titulo">Título del curso</label>
            <input type="text" name="titulo" id="titulo" required>

            <div class="drag-drop-area">
                <p>Arrastra y suelta una imagen aquí</p>
                <input type="file" name="foto" id="foto" required accept="image/*" multiple="false">
            </div>
            <label for="videos">Selecciona un video:</label>
            <select name="video" id="video">
                <?php foreach ($video as $curso) : ?>
                    <option value="<?php echo $curso['id_vuideo']; ?>"><?php echo $curso['video']; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <label for="titulo">Precio</label>
            <input type="text" name="precio" id="precio" required>
            <br><br>

            <label for="categorias">Selecciona una categoría:</label>
            <select name="categoria" id="categoria">
                <?php foreach ($categoria as $curso) : ?>
                    <option value="<?php echo $curso['id_categoria']; ?>"><?php echo $curso['categoria']; ?></option>
                <?php endforeach; ?>
                <br><br>

        </div>
        <div>
            <!-- Agregar otros campos del formulario según tus necesidades -->
        </div>
        <div>
            <input type="submit" value="Registrar Curso">
        </div>
    </form>
</body>

</html>

</html>