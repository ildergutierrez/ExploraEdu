<?php
include('Conexion_bd.php');
$date = date("Y-m-d");
$usuarios = $_POST['correo'];
$asunto = $_POST['asunto'];
if ($asunto == "") {
    $asunto = "Sin asunto";
}
$imagen = $_FILES["imagen"]["name"];
$contenido = $_POST['comentario'];
if ($contenido == "") {
    $contenido = "Sin comentarios";
}

if ($imagen != null) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {

        $directorio_destino = "../recomendaciones/";
        $carpeta_usuario = $carpeta_envios . '/' . $usuario;
        if (!file_exists($carpeta_usuario)) {
            mkdir($carpeta_usuario, 0777, true);
        }

        $nombre_archivo = $_FILES["imagen"]["name"];

        // Ruta completa del archivo de destino
        $archivo_destino = $directorio_destino . $nombre_archivo;

        // Mover el archivo desde la ubicación temporal al directorio de destino
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo_destino)) {

            $query = "INSERT INTO `recomendaciones`(`Usuario`, `Imagen`, `Asunto`, `Comentarios`, `Fecha`) VALUES ('$usuarios','$nombre_archivo','$asunto','$contenido','$date')";

            $ejecutar = mysqli_query($conexion, $query);
            mysqli_close($conexion);
            echo '<script> alert("Se envio la recomendacion con exito");
                location.href = "../Paginas/recomendaciones usuario.php";
                </script>';
            exit();
        } else {
            echo '<script> alert("Hubo un error al cargar la imagen. solo se aceptan .jpg");
                location.href = "../Paginas/recomendaciones usuario.php";
                </script>';
        }
    }
} else {
    echo '<script> alert("No se envio la recomendacion, es necesaria la imagen");
    location.href = "../Paginas/recomendaciones usuario.php";
    </script>';
    exit();
}
