<?php
include('Conexion_bd.php');

if (isset($_FILES['archivo']) && !empty($_FILES['archivo']['name'][0])) {

    $usuario = $_POST['usuario'];
    $comentario = $_POST['comentario'];
    if ($comentario == "") {
        $comentario = "Sin comentarios";
    }
    $asunto = $_POST['asunto'];
    if ($asunto == "") {
        $asunto = "Sin Asunto";
    }
    $date = date("Y-m-d-");
    $dateg = date("Y-m-d-H-i-s");

    $carpeta_envios = '../Envios';
    if (!file_exists($carpeta_envios)) {
        mkdir($carpeta_envios, 0777, true);
    }

    $carpeta_usuario = $carpeta_envios . '/' . $usuario;
    if (!file_exists($carpeta_usuario)) {
        mkdir($carpeta_usuario, 0777, true);
    }
    $carpeta =  $carpeta_envios . '/' . $usuario . '/' . $dateg;
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    foreach ($_FILES['archivo']['tmp_name'] as $key => $tmp_name) {

        $nombre_archivo = $_FILES['archivo']['name'][$key];
        $ruta_archivo =  $carpeta . '/' . $nombre_archivo;
        move_uploaded_file($tmp_name, $ruta_archivo);
    }


    $ruta_carpeta_bd = str_replace('../', '', $carpeta);
    $query = ("INSERT INTO `envios`(`Usuario`, `Asunto`, `Carpeta`, `Comentarios`, `Fecha`) VALUES ('$usuario','$asunto','../$ruta_carpeta_bd','$comentario','$date')");
    $ejecutar = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    echo '<script>
    alert("Envio Exitoso");
    location.href = "../Paginas/experiencia usuario.php";
    </script>';
    exit();
} else {
    echo '<script>
    alert("No se envio ningun archivo");
    location.href = "../Paginas/experiencia usuario.php";
    </script>';
    exit();
}
