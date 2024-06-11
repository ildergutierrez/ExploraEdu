<?php
include('../../php/Conexion_bd.php');
$accion = $_GET['accion'];

$id = $_GET['acceso'];

if ($accion == "Experiencias") {
    $consulta = "SELECT * FROM envios WHERE id ='$id'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        $query = "DELETE FROM `envios` WHERE id = '$id'";
        $ejecutar = mysqli_query($conexion, $query);
        mysqli_close($conexion);
        echo '<script>
    location.href = "../pagina/N_Experiencia.php";
    </script>';
        exit();
    } else {
        echo '<script>
    alert("Ups, Ocurrio un error ");
    location.href = "../pagina/N_Experiencia.php";
    </script>';
        exit();
    }
}
if ($accion ==  "Recomendacion") {
    $consulta = "SELECT * FROM recomendaciones WHERE id ='$id'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        $query = "DELETE FROM `recomendaciones` WHERE id = '$id'";
        $ejecutar = mysqli_query($conexion, $query);
        mysqli_close($conexion);
        echo '<script>
    location.href = "../pagina/N_Recomendacion.php";
    </script>';
        exit();
    } else {
        echo '<script>
    alert("Ups, Ocurrio un error ");
    location.href = "../pagina/N_Recomendacion.php";
    </script>';
        exit();
    }
}
