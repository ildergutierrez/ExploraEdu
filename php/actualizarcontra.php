<?php
session_start();

$usuario = $_SESSION['Email'];

include('Conexion_bd.php');
$actual = $_POST['contra'];
$pNueva = $_POST['password'];
$sNueva = $_POST['confirm_password'];

$consulta = "SELECT * FROM user WHERE Email='$usuario'";
$resultado = mysqli_query($conexion, $consulta);


if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $contrasena_almacenada = $fila['contrasena'];

    echo $contrasena_almacenada;
    // Verifica si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
    //  if (password_verify($actual, $contrasena_almacenada))
    if (password_verify($actual, $contrasena_almacenada)) {
        $sNueva = password_hash($pNueva, PASSWORD_DEFAULT);
        $query = "UPDATE user SET contrasena='$sNueva'  WHERE Email='$usuario'";
        $ejecutar = mysqli_query($conexion, $query);

        if ($ejecutar) {

            echo '
            <script>
        alert("Contraseña Actualizada");
    </script>
            ';
        }
        header("location: ../paginas/perfil.php");
        mysqli_close($conexion);
    } else {
        echo '
    <script>
alert("Contraseña no es la actual");
</script>
    ';
        header("location: ../paginas/nueva.php");
    }
}
