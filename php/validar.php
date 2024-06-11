<?php
include('Conexion_bd.php');
session_start(); // Inicia la sesión si aún no está iniciada

// Verifica si se ha enviado una contraseña a través del formulario
if (isset($_POST['contrasena']) && !empty($_POST['contrasena'])) {
    $contrasenaIngresada = $_POST['contrasena'];

    // Obtén la contraseña del usuario desde la base de datos
    $E_mail = $_SESSION['Email'];
    $consulta = "SELECT contrasena FROM user WHERE Email = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $E_mail);
    $stmt->execute();
    $stmt->bind_result($contrasenaUsuario);
    $stmt->fetch();

    // Verifica si se encontró la contraseña en la base de datos
    if ($contrasenaUsuario) {
        // Verifica si la contraseña ingresada por el usuario coincide con la contraseña almacenada en la base de datos
        if (password_verify($contrasenaIngresada, $contrasenaUsuario)) {
            // La contraseña es correcta, puedes proceder con la actualización de datos
            echo "correcta";
        } else {
            // La contraseña es incorrecta
            echo "incorrecta";
        }
    } else {
        // No se encontró la contraseña en la base de datos
        echo "no_encontrada";
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $conexion->close();
} else {
    // No se ha enviado una contraseña a través del formulario
    echo "sin_contrasena";
}
?>
