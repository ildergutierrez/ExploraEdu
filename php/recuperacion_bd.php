<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '..\vendor\phpmailer\phpmailer\src\Exception.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';

include('conexion_bd.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $incrip = base64_encode($email);
    $consultae = "SELECT * FROM user WHERE Email='$email'";
    echo "<script>
    alert('$consultae');
    
    </script>";

    $Verificacion_email = mysqli_query($conexion, $consultae);

    if (mysqli_num_rows($Verificacion_email) > 0) {

        $mail = new PHPMailer();

        // Configuración del servidor SMTP (asegúrate de configurar esto adecuadamente para tu entorno)
        $mail->isSMTP();
        $mail->Host = 'localhost'; // Cambiar esto por la dirección del servidor SMTP4Dev
        $mail->SMTPAuth = false; // Cambiar a true si SMTP4Dev requiere autenticación SMTP
        $mail->Port = 25; // Puerto SMTP4Dev
        $mail->setFrom('ilder1296@gmail.com', 'Explora Edu');
        $mail->addAddress($email);
        $mail->Subject = 'Recuperación de contraseña';
        $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: http://localhost/restablecer_contraseña.php?id=$incrip";
        if ($mail->send()) {
            echo "<script>
            alert('Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.');
            location.href ='../index.php';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Error al enviar el correo electrónico:  . $mail->ErrorInfo');
            location.href ='../index.php';
            </script>";
            exit();
        }
    } else {
        // Si el correo no existe en la base de datos
        echo "<script>
        alert('El correo electrónico no está registrado.');
        location.href ='../index.php';
        </script>";
        exit();
    }
}
