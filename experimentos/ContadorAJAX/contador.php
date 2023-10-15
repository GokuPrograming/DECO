<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="contador"></div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "conexion.php", // Ruta al archivo de servidor
                type: "GET",
                success: function(data) {
                    $("#contador").text("Total: " + data); // Muestra el valor en la barra de navegación
                }
            });
        });
    </script>
</body>
</html>
