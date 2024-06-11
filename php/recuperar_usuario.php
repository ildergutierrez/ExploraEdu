<?php
include 'Conexion_bd.php';
$sinde = $_POST['email'];
$desco = base64_decode($sinde);
$usuario = $desco;
$Pnueva2 = $_POST['confirm_password'];
$pNueva = $_POST['password'];

if ($Pnueva2 == $pNueva) {
    $consulta = "SELECT * FROM user WHERE Email='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $sNueva = password_hash($pNueva, PASSWORD_DEFAULT);
        $query = "UPDATE user SET contrasena='$sNueva'  WHERE Email='$usuario'";
        $ejecutar = mysqli_query($conexion, $query);
        if ($ejecutar) {
            echo "<script>
        alert('La Contraseña a sido actualizada correctamente');
        location.href ='../index.php';
        </script>";
        }
        mysqli_close($conexion);
    }
} else {
    echo "<script>
    alert('Las contraseñas son diferentes');
    location.href ='../Paginas/restablecer_contraseña.php?id=$sinde';
    </script>";
}
