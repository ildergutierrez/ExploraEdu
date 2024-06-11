<?php
session_start();
include('conexion.php'); // Incluye el archivo de conexión a la base de datos

if(isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verifica si el token existe en la base de datos y no ha expirado (por ejemplo, en las últimas 24 horas)
    $consulta = "SELECT * FROM password_reset WHERE token='$token' AND created_at >= NOW() - INTERVAL 1 DAY";
    $resultado = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($resultado) == 1) {
        // El token es válido, muestra el formulario para restablecer la contraseña
        // El usuario puede ingresar su nueva contraseña aquí
    } else {
        // Si el token no es válido o ha expirado, redirige a la página de solicitud de restablecimiento de contraseña
        $_SESSION['error'] = "Invalid or expired token.";
        header("Location: forgot_password.php");
        exit();
    }
} else {
    // Si el token no está presente en la URL, redirige a la página de solicitud de restablecimiento de contraseña
    header("Location: forgot_password.php");
    exit();
}
?>
