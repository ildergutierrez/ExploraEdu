<?php
session_start();
$acceso = $_GET['acceso'];
$llenar = false;
if ($acceso !== '0') {
    $llenar = true;
}
if (!isset($_SESSION['Email'])) {

    header("Location: ../../index.php");
} else {
    $user = $_SESSION['Email'];
    $usuario = $user;
    $dominio_especifico = "exploraeducolombia.com.co";
    if (strpos($usuario, "@" . $dominio_especifico) == false) {

        echo '<script>
        alert("Acceso Denegado");
        location.href = "inicio.php";
        </script>';
    } else {
        $usuario = $_SESSION['contra'];
    }
}
$envios = false;
$recomendacion = false;
$fecha = date("Y-m-d");
$ruta = "../../Blogs/predeterminado.jpg";

//Conexion base de datos
include('../../php/Conexion_bd.php');
$sql = "SELECT * FROM envios";
$resultado = $conexion->query($sql);
if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['Visto'] == "")
            $envios = true;
    }
}
$rec = "SELECT * FROM recomendaciones";
$res = $conexion->query($rec);
if ($res && $res->num_rows > 0) {
    while ($fc = $res->fetch_assoc()) {
        if ($fc['Visto'] == "")
            $recomendacion = true;
    }
}

$consulta = "SELECT * FROM 	user WHERE Email='$usuario'";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $user = mysqli_fetch_assoc($resultado);
    $autor = $user['Full_Name'];
}
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edición</title>
    <link rel="icon" href="../../imagen/Logo/Icono.svg" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        background: #DEE8E7;
    }
</style>

<body>
    <div class="container-fluid" style="padding: 0">
        <header>
            <nav class="navbar navbar-expand-lg" style="
            background: #E8DFC0  ;
            position: fixed;
            z-index: 100;
            width: 100%; ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="inicio.php"><img src="../../imagen/Logo/Icono.svg" alt="Logo" width="60px" style="border-radius: 100%" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Blogs.php">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Acuerdos.php">Acuerdos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="Convenios.php">Convenios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Ayuda.php">Ayuda</a>
                            </li>
                        </ul>
                        <form class="d-flex ">
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll align-items-center" style="--bs-scroll-height: 100px">
                                    <li class="nav-item">
                                        <label><?php echo $usuario ?></label>
                                    </li>&ensp;&ensp;
                                    <li class="nav-item">
                                        <div id="enviosp"></div>
                                    </li>&ensp;&ensp;
                                    <li class="nav-item">
                                        <div id="Recomendacion"></div>
                                    </li>
                                    &ensp;&ensp;
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../php/cerrar.php"><img src="../imagenes/salir.png" alt="Salir" title="Cerrar sesión  "></a>
                                    </li>
                                    &ensp;&ensp;
                                </ul>
                            </div>
                        </form>
                    </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <br><br>
                <div class="row" style="overflow: hidden; margin: auto; height: 25em;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div id="vista-previa"> <img src="<?php echo $ruta ?>" alt="Puhs" style="width: 100%;  border-radius: 20px; margin: auto;"></div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8">
                        <div>
                            <div class="container">
                                <?php if ($llenar == false) { ?>
                                    <form method="post">
                                        <input type="hidden" name="acceso" id="acceso" value="1">
                                        <div style="border-radius: 15px; background: #E1DBB3; text-align: justify; padding: 10px; width: 100%;" class="form-label">
                                            <b>Titulo:</b> <input require type="text" name="titul" id="titul" maxlength="90" style="width: 90%; text-align: center; border-radius: 7px;"><br><br>
                                            <div id="contador" style="padding-left: 80px;">Caracteres restantes: 7400</div>
                                            <textarea require name="escrito" id="escrito" oninput="contarCaracteres()" cols="90" rows="30" style="resize: none; border: solid 2px #000; border-radius: 15px; border: none; padding: 8px;"></textarea>
                                        </div> <br>
                                        <div class="container" style="background:#E1DBB3; border-radius: 10px;">
                                            <br><b>Fecha: </b><input name="date" id="date" value="<?php echo $fecha ?>" type="text" readonly style="background: transparent; border: none;"><br>
                                            <br> <b>Autor: </b> <input style="background: transparent; border: none; width: 50%;" value="<?php echo $usuario ?>" name="aut" id="aut" type="text" readonly>
                                            <br>
                                            <center><button class="btn btn-primary btn-lg">Guardar</button></center>
                                            <br>
                                        </div>
                                        <br><br><br> <br><br><br><br>
                                    </form>
                                <?php }  ?>
                                <div>
                                    <?php
                                    if ($acceso !== '0') {
                                        include('../../php/Conexion_bd.php');

                                        $titulo = $_GET['titul'];
                                        if ($titulo == "") {
                                            $titulo = "Sin titulo";
                                        }
                                        $cuerpo = $_GET['escrito'];
                                        if ($titulo !== '' && $cuerpo !== '') {
                                            $cuerpo = str_replace("\n", "<br>", $cuerpo);
                                            $querry = "INSERT INTO `blogs`(`Titulo`, `Cuerpo`, `Autor`, `Fecha`) VALUES ('$titulo','$cuerpo','$autor','$fecha')";
                                            $ejecutar = mysqli_query($conexion, $querry);
                                            mysqli_close($conexion);
                                            echo '<script>
                                            alert("Articulo Guardado Exitosamente");
                                            window.location.href = "Blogs.php";
                                            </script>';
                                            exit();
                                        } else {
                                            echo '<script>
                                            alert("No se Guardo el articulo; El campo Titulo y Cuerpo deben contener información");
                                            location.href="Blogs.php";
                                            </script>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>

            </div>

        </main>
    </div>
</body>
<!-- Contador de caracteres -->
<script>
    function contarCaracteres() {
        try {
            var comentario = document.querySelector('textarea[name="escrito"]');
            if (comentario) {
                var longitud = comentario.value.length;
                var maximo = 7400;
                var restantes = maximo - longitud;
                var contador = document.getElementById("contador");
                if (contador) {
                    contador.textContent = "Caracteres restantes: " + restantes;
                }
            }
        } catch (error) {
            console.error("Error al contar caracteres:", error);
        }
    }
</script>

<!-- fin de vista -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/bootstrap.bundle.min.js"></script>
<script src="../../control/actualizar.js"></script>

</html>