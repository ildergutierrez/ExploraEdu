<?php
session_start();
include('Conexion_bd.php');
$User = $_POST['Nombre_completo'];
$email = strtolower($_POST['correo']);

if (isset($_SESSION['Email'])) {
    $E_mail = $_SESSION['Email'];
    $email = strtolower($_POST['correo']);

    if ($E_mail != $email) {
        $consultai = "SELECT Imagen FROM user WHERE Email='$E_mail'";
        $Verificacion_im = mysqli_query($conexion, $consultai);

        if (mysqli_num_rows($Verificacion_im) > 0) {
            // Nombre original y nuevo nombre del archivo
            $nombreOriginal = $E_mail . ".jpg";
            $nuevoNombre = $email . ".jpg";

            // Ruta completa de la carpeta donde se encuentran las imágenes
            $rutaImagenes = "../img_User/";

            // Verificar si el archivo original existe en la carpeta
            if (file_exists($rutaImagenes . $nombreOriginal)) {
                // Cambiar el nombre del archivo
                if (rename($rutaImagenes . $nombreOriginal, $rutaImagenes . $nuevoNombre)) {
                    // echo "El nombre del archivo se cambió correctamente.";
                } else {
                    echo "No se pudo cambiar el nombre del archivo.";
                }
            } else {
                echo "El archivo no existe en la carpeta.";
            }
            // Actualiza el valor de $_SESSION['Email'] con el nuevo correo electrónico
            $_SESSION['Email'] = $email;
        } else {
            echo "No se encontró ninguna imagen asociada al correo actual.";
        }
    }
} else {
    echo "La sesión 'Email' no está establecida.";
}
$Departamento = $_POST['departamento'];
$Ciudad = $_POST['ciudad'];
$llamar = $_POST['numero'];
$llamar = $_POST['numero'];
$llamar = str_replace(' ', '', $llamar);
$consultae = "SELECT * FROM user WHERE Email='$E_mail'";
$Verificacion_email = mysqli_query($conexion, $consultae);

$query = "SELECT Imagen FROM user WHERE Email='$E_mail'";
$resultado = mysqli_query($conexion, $query);
if ($resultado) {
    $query = "UPDATE user SET Full_Name='$User', Email='$email', Imagen='$email.jpg', Departamento='$Departamento', Ciudad='$Ciudad', Contacto='$llamar'  WHERE Email='$E_mail'";
} else {
    $query = "UPDATE user SET Full_Name='$User', Email='$email', Imagen='', Departamento='$Departamento', Ciudad='$Ciudad', Contacto='$llamar'  WHERE Email='$E_mail'";
}
if (mysqli_num_rows($Verificacion_email) > 0) {
    "UPDATE * FROM user WHERE Full_Name ='$User',Email='$E_mail'";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '<script>
        alert("Se actualizo la información");
        location.href = "../Paginas/perfil.php";
        </script>';
    } else {
        echo '<script>
        alert("No se actualizo la información");
        location.href = "../Paginas/perfil.php";
        </script>';
    }

    mysqli_close($conexion);
} else {
    echo "No se realizo ninguna accion";
}
