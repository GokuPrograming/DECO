<?php
// Inicia la sesión si aún no está iniciada
session_start();

// Obtiene el ID de sesión actual
$currentSessionId = session_id();

// Cierra la sesión actual
session_destroy();

// Recorre todas las sesiones y las cierra
session_start();
session_regenerate_id(true); // Genera un nuevo ID de sesión

// Repite el proceso para cada sesión individual
$sessionPath = session_save_path(); // Obtiene la ruta del directorio de sesiones
$sessionFiles = scandir($sessionPath);

foreach ($sessionFiles as $sessionFile) {
    if (strpos($sessionFile, "sess_") === 0) {
        $sessionFileName = $sessionPath . DIRECTORY_SEPARATOR . $sessionFile;
        if (is_file($sessionFileName)) {
            // Obtén el ID de sesión del archivo
            $sessionFileContent = file_get_contents($sessionFileName);
            $sessionId = substr($sessionFileContent, 0, strpos($sessionFileContent, "|"));

            // Si no es la sesión actual, destruye la sesión
            if ($sessionId !== $currentSessionId) {
                session_id($sessionId);
                session_start();
                session_destroy();
            }
        }
    }
}

// Cierra la sesión actual nuevamente
session_id($currentSessionId);
session_start();
session_destroy();

// Redirige a una página deseada
header("Location: ../index.html");
exit();
?>
