<?php
include('Conexion_bd.php');

$nombre = $_POST["Nombre_completo"];
$E_mail = strtolower($_POST["correo"]);
$Departamento = $_POST['departamento'];
$Ciudad = $_POST['ciudad'];
$llamar = $_POST['numero'];
$contrasena1 = $_POST["contra1"];
$contrasena2 = $_POST["contra2"];
$contra = "";
$dominio_especifico = "exploraeducolombia.com.co";
if (strpos($E_mail, "@" . $dominio_especifico) !== false) {
    echo '<script>
        alert("Correo no valido");
        location.href = "../index.php";
        </script>';
    exit();
}

if ($contrasena1 == $contrasena2) {
    $contra = password_hash($contrasena1, PASSWORD_DEFAULT);
    $query = "INSERT INTO user(Full_Name,Email,contrasena,Departamento,Ciudad,Contacto) VALUES ('$nombre','$E_mail','$contra','$Departamento','$Ciudad','$llamar')";
    //verificación de correo y usuario
    $consultae = "SELECT * FROM user WHERE Email='$E_mail'";
    $Verificacion_email = mysqli_query($conexion, $consultae);
    //verificación correo
    if (mysqli_num_rows($Verificacion_email) > 0) {
        echo '<script>
        alert("Correo en uso");
        location.href = "../index.php";
        </script>';
        exit();
    }


    //$ejecutar = mysqli_query($qconnection_aborted($connection), $query) or die(mysqli_error($connection));  //forma directa, si el include
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '<script>
        alert("El usuario se ha registrado con exito");
        location.href = "../index.php";
        </script>';
    } else {
        echo '<script>
        alert("Ups, Ocurrio un error al momento de registrarse");
        location.href = "../index.php";
        </script>';
    }

    mysqli_close($conexion);
} else {
    echo "No se realizo ninguna accion";
}
