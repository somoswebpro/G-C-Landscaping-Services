<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================
    // DATOS DEL FORMULARIO
    // =========================
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $phone   = htmlspecialchars($_POST['phone'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $service = htmlspecialchars($_POST['service'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // =========================
    // CONFIGURACIÓN DEL CORREO
    // =========================
    $to = "somoswebpro.mx@gmail.com";
    $subject = "New Free Estimate Request";

    // IMPORTANTE:
    // Si tu hosting lo requiere, usa un correo de tu dominio
    $from = "noreply@tudominio.com";

    // =========================
    // HEADERS
    // =========================
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: G&C Landscaping Services <$from>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // =========================
    // CONTENIDO DEL CORREO
    // =========================
    $body = "
    <html>
    <head>
        <title>New Estimate Request</title>
    </head>
    <body style='font-family:Arial,sans-serif;'>

        <h2 style='color:#2d6a4f;'>New Free Estimate Request</h2>

        <table cellpadding='10' cellspacing='0' border='1' style='border-collapse:collapse;width:100%;max-width:600px;'>

            <tr>
                <td><strong>Full Name</strong></td>
                <td>{$name}</td>
            </tr>

            <tr>
                <td><strong>Phone Number</strong></td>
                <td>{$phone}</td>
            </tr>

            <tr>
                <td><strong>Email Address</strong></td>
                <td>{$email}</td>
            </tr>

            <tr>
                <td><strong>Service Needed</strong></td>
                <td>{$service}</td>
            </tr>

            <tr>
                <td><strong>Message</strong></td>
                <td>{$message}</td>
            </tr>

        </table>

    </body>
    </html>
    ";

    // =========================
    // ENVIAR CORREO
    // =========================
    if (mail($to, $subject, $body, $headers)) {

        header("Location: index.html?success=1");
        exit;

    } else {

        header("Location: index.html?error=1");
        exit;

    }
}
?>
