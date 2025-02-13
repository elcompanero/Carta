<?php
// Verificar si hay un ID en la URL
if (isset($_GET['id'])) {
    $unique_id = $_GET['id'];

    // Ruta del archivo JSON correspondiente al ID
    $file_path = 'mensajes/' . $unique_id . '.json';

    // Verificar si el archivo existe
    if (file_exists($file_path)) {
        // Leer el archivo JSON
        $data = json_decode(file_get_contents($file_path), true);

        // Mostrar la carta
        echo '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Carta de ' . htmlspecialchars($data['nombre']) . '</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="contenedor">
                <h1>Mensaje de ' . htmlspecialchars($data['nombre']) . '</h1>
                <div class="sobre">
                    <div class="carta">
                        <p><strong>De: </strong>' . htmlspecialchars($data['nombre']) . '</p>
                        <p><strong>Correo: </strong>' . htmlspecialchars($data['correo']) . '</p>
                        <p><strong>Mensaje:</strong></p>
                        <p>' . nl2br(htmlspecialchars($data['mensaje'])) . '</p>
                    </div>
                </div>
            </div>
        </body>
        </html>';
    } else {
        echo 'El mensaje no existe o ha sido eliminado.';
    }
} else {
    echo 'No se ha proporcionado un ID válido.';
}
?>
