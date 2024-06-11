<?php
include('Conexion_bd.php');
$E_mail = $_SESSION['Email'];

// Consultar el nombre de la imagen del usuario
$query = "SELECT Imagen FROM user WHERE Email='$E_mail'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    // Obtener el nombre de la imagen del resultado de la consulta
    $fila = mysqli_fetch_assoc($resultado);
    $nombre_imagen = $fila['Imagen'];

    // Construir la ruta completa de la imagen
    $ruta_imagen = "../img_User/" . $nombre_imagen;

    // Verificar si la imagen existe en el directorio
    if (file_exists($ruta_imagen)) {
        // Mostrar la imagen en la página
        //echo '<img src="' . $ruta_imagen . '" alt="Foto de perfil">';
    } else {
        echo "La imagen de perfil no existe.";
    }
} else {
    echo "El usuario no tiene una imagen de perfil.";
}

mysqli_close($conexion);
?>
