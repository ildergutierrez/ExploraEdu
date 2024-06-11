<?php
session_start();
include('Conexion_bd.php');
$nommbre = $_POST['acceso'];
$descripcion = $_POST['Descrip'];
$acceso = $_POST['ruta'];
$id = $_POST['id_exp'];


$usuario = $_POST['usuarios'];
$comentario = $_POST['comentarios'];
$id_exp = $_POST['id_exp'];
$fecha_actual = date("Y-m-d");

if ($comentario == null) {

    $nommbre = $_POST['acceso'];
    $descripcion = $_POST['Descrip'];
    $acceso = $_POST['ruta'];
    $id = $_POST['id_exp'];


    $_SESSION['from_redirect'] = true;

    header("Location: ../paginas/comentarios.php?nommbre=$nommbre&descripcion=$descripcion&acceso=$acceso&id=$id");
    exit();
}
$comentario = nl2br($comentario);


$posicion_arroba = strpos($usuario, "@");
if ($posicion_arroba !== false) {
    $usuario = substr($usuario, 0, $posicion_arroba);
}

$query = "INSERT INTO comentarios(id_experiencia,usuario, comentario, Fecha) VALUES ('$id_exp','$usuario','$comentario','$fecha_actual')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    header("location: ../paginas/comentarios.php");
} else {
    echo '<script>
        alert("Ocurrio un error");
        location.href = "../paginas/comentarios.php";
      </script>';
}

mysqli_close($conexion);

$nommbre = $_POST['acceso'];
$descripcion = $_POST['Descrip'];
$acceso = $_POST['ruta'];
$id = $_POST['id_exp'];


$_SESSION['from_redirect'] = true;

header("Location: ../paginas/comentarios.php?nommbre=$nommbre&descripcion=$descripcion&acceso=$acceso&id=$id");
