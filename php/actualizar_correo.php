<?php
include('Conexion_bd.php');
session_start(); // Inicia la sesión si aún no está iniciada

// Obtén el correo anterior y el nuevo correo
$correoAnterior = $_SESSION['Email'];
$nuevoCorreo = $_POST['Correo2'];

// Actualiza el correo en la base de datos
$consulta = "UPDATE user SET Email = ? WHERE Email = ?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("ss", $nuevoCorreo, $correoAnterior);
$stmt->execute();
$stmt->close();

// Renombra la imagen en la carpeta
$directorioImagenes = '../img_User/';
$nombreImagenAnterior = $correoAnterior . '.jpg';
$nombreImagenNuevo = $nuevoCorreo . '.jpg';
$rutaImagenAnterior = $directorioImagenes . $nombreImagenAnterior;
$rutaImagenNuevo = $directorioImagenes . $nombreImagenNuevo;

if (file_exists($rutaImagenAnterior)) {
    // Si la imagen anterior existe, renómbrala con el nuevo correo
    rename($rutaImagenAnterior, $rutaImagenNuevo);
} else {
    echo "La imagen anterior no existe en la carpeta.";
}

// Actualiza el correo en la sesión
$_SESSION['Email'] = $nuevoCorreo;
echo "Correo actualizado correctamente.";
