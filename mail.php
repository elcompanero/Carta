<?php
// Incluir las clases de PHPMailer manualmente
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

// Usar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Crear una URL única (hash)
    $unique_id = md5(uniqid(rand(), true)); // Generamos un hash único

    // Guardar los datos en un archivo JSON
    $data = array(
        'nombre' => $nombre,
        'correo' => $correo,
        'mensaje' => $mensaje,
    );

    // Ruta del archivo donde se guardarán los datos
    $file_path = 'mensajes/' . $unique_id . '.json';
    file_put_contents($file_path, json_encode($data)); // Guardamos el mensaje en un archivo JSON

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Cambia a tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'ja125535@gmail.com'; // Tu correo
        $mail->Password = 'swii ncjb ctiw zazt';  // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('tuemail@dominio.com', $nombre); // Remitente es el usuario
        $mail->addAddress($correo);  // Correo destinatario

        // Asunto y cuerpo del correo
        $mail->isHTML(true);
        $mail->Subject = '¡Tienes un nuevo mensaje de ' . $nombre . '!';
        $mail->Body    = '<strong>' . $nombre . '</strong> te ha enviado un mensaje:<br><br>' . nl2br($mensaje);
        $mail->Body   .= '<br><br>Para ver tu mensaje, haz clic en el siguiente enlace: <a href="http://tusitio.com/carta.php?id=' . $unique_id . '">Ver mensaje</a>';

        // Enviar el correo
        if ($mail->send()) {
            echo 'El mensaje ha sido enviado exitosamente.';
        } else {
            echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
        }

    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
