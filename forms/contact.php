<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $asunto = trim($_POST["asunto"]);
    $mensaje = trim($_POST["mensaje"]);

    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        echo "Error: Todos los campos son obligatorios.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Correo no válido.";
        exit;
    }

    $to = "raguesal64@gmail.com";  // Cambia esto por tu correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $mensajeCompleto = "Nombre: $nombre\nCorreo: $email\nAsunto: $asunto\nMensaje:\n$mensaje";

    if (mail($to, $asunto, $mensajeCompleto, $headers)) {
        echo "success";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
