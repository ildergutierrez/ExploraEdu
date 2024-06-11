<?php
session_start();

include 'Conexion_bd.php';
$usuario = strtolower($_POST['user']);
$contra_ingresada = $_POST['pass'];
$pagina = $_POST['link'];
$dominio_especifico = "exploraeducolombia.com.co";

$consulta = "SELECT * FROM user WHERE Email='$usuario'";
$resultado = mysqli_query($conexion, $consulta);


if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $contrasena_almacenada = $fila['contrasena'];
    $no = $fila['Full_Name'];


    if (password_verify($contra_ingresada, $contrasena_almacenada)) {
        // La contraseña es correcta
        $_SESSION['Email'] = $usuario;
        $_SESSION['contra'] = trim($no);

        // si es de la empresa
        if (strpos($usuario, "@" . $dominio_especifico) !== false) {
            header("Location: ../Funcionarios/inicio.php");
        } else {
            header("Location: $pagina");
        }
        // fin si es funconario
        exit();
    } else {
        echo "<script>
        alert('Usuario o contraseña incorrecta');
        location.href = '$pagina';
        </script>";
    }
} else {
    // No se encontró un usuario con ese correo electrónico
    echo "<script>
        alert('Usuario o contraseña incorrecta');
        location.href = '$pagina';
        </script>";
}

$conexion->close();
