<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajería</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        <h1>Enviar Mensaje</h1>
        <form action="mail.php" method="POST">
            <div class="formulario">
                <label for="nombre">Tu nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre, por favor" required>

                <label for="correo">Correo destinatario:</label>
                <input type="email" id="correo" name="correo" placeholder="Por favor ingresar correo electronico" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" placeholder="Por favor, escribe el mensaje..." rows="5" required></textarea>

                <button type="submit" id="enviar">Enviar</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
