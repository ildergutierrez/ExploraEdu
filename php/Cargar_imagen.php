<?php
include('Conexion_bd.php');
session_start();
$E_mail = $_SESSION['Email'];
echo $E_mail;
// Verificar si se ha enviado un archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {

    $directorio_destino = "../img_User/";

    $nombre_archivo = $E_mail . ".jpg";

    // Ruta completa del archivo de destino
    $archivo_destino = $directorio_destino . $nombre_archivo;

    // Mover el archivo desde la ubicación temporal al directorio de destino
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo_destino)) {
        echo '
        <script>
        alert("Imagen Guardada Correctamenet " );
        location.href: ../Paginas/perfil.php"
        </script>';
    } else {
        echo "Hubo un error al cargar la imagen. solo se aceptan .jpg";
    }

    //Base de datos Nota: Se guarda con el nombre del correo
    $query = "UPDATE user SET Imagen='$nombre_archivo' WHERE Email='$E_mail'";

    $consultae = "SELECT * FROM user WHERE Email='$E_mail'";
    $Verificacion_email = mysqli_query($conexion, $consultae);

    if (mysqli_num_rows($Verificacion_email) > 0) {
        "UPDATE * FROM user  Imagen='$E_mail' WHERE Email='$E_mail'";
        $ejecutar = mysqli_query($conexion, $query);

        if ($ejecutar) {
        } else {
            echo '<script>
    alert("Imagen no subida");
    location.href: ../Paginas/perfil.php"
    </script>';
        }

        mysqli_close($conexion);
    } else {
        echo "No se realizo ninguna accion";
    }
}
