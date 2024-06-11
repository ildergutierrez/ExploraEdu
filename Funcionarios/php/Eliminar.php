<?php
include('../../php/Conexion_bd.php');
$id = $_GET['acceso'];

$consulta = "SELECT * FROM blogs WHERE id ='$id'";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) > 0) {
    $query = "DELETE FROM `blogs` WHERE id = '$id'";
    $ejecutar = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    echo '<script>
    alert("Se elimino el Articulo");
    location.href = "../pagina/Blogs.php";
    </script>';
    exit();
} else {
    echo '<script>
    alert("Ups, Ocurrio un error ");
    location.href = "../pagina/Blogs.php";
    </script>';
    exit();
}
