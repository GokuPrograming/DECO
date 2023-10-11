<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../Controladores/ctlCarrito.php'; ?>
    <section class="secao_lista_filmes">
    <div class="container">
        <h2>los del carrito</h2>
        <ul class="em_alta">
            <?php foreach ($usuariosCarrito as $curso) : ?>
                <li>
                    <figure>
                        <img class="" src="../assets/img/<?php echo $curso['imagen']; ?>" width="100" alt="<?php echo $curso['titulo']; ?>">
                        <figcaption class=""><?php echo $curso['titulo']; ?></figcaption>
                        <div>
                            <form action="" method="post">
                                <button class="boton_favorito">Favorito</button>
                                <a href="../Controladores\ComprasCarrito.php?id=<?php // echo $curso['id_lista_cursos']; 
                                ?>">Comprar</a>
                              
                            </form>
                        </div>
                    </figure>
                </li>
            <?php endforeach; 
        
          
            ?>
              <a href="../Controladores/ComprasCarrito.php">comprar</a>
        </ul>
    </div>
</section>
</body>
</html>
