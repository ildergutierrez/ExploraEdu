<?php
$envios = false;
$recomendacion = false;
session_start();
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
$autor=$usuario;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blogs</title>
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

    .cuerpo {
        width: 100%;
        height: 10.9em;
        overflow: hidden;
    }

    a {
        text-decoration: none;
        text-align: center;
        color: #000000;
    }


    .leer {
        float: inline-end;
        background: transparent;
        border: none;
        padding: 2px;
        width: 30%;
    }

    .leer:hover {
        background: #DAEAE7;
        border-radius: 8px;

    }
</style>

<body>
    <div class="container-fluid" style="padding: 0">
        <header>
            <nav class="navbar navbar-expand-lg" style="
            background: #E8DFC0  ;
            position: fixed;
            z-index: 100;
            width: 100%;
          ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../inicio.php"><img src="../../imagen/Logo/Icono.svg" alt="Logo" width="60px" style="border-radius: 100%" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../inicio.php">Inicio</a>
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
                                        <form action="Acciones_Blogs.php" method="post">
                                            <input type="hidden" value="0" name="acceso" style="background: transparent;">
                                            <a style="background: transparent; cursor: pointer;" href="Nuevo.php?acceso=0"><img src="../imagenes/editar.png" width="100%" alt="Blogs" title="Nuevo Articulo"></a>
                                        </form>
                                    </li>&ensp;&ensp;
                                    <li class="nav-item">
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
            <div class="container" style="text-align: justify; padding: 80px; text-align: 1 em;">
                <center>
                    <br><br>
                    <h1>Blogs Explora Edu</h1>
                </center>
                <br />
                <?php
                include('../../php/Conexion_bd.php');
                $sqlB = "SELECT * FROM blogs";
                $resultadoB = $conexion->query($sqlB);
                if ($resultadoB && $resultadoB->num_rows > 0) {
                    $contador_filas = 0;
                    $contador_carruseles = 0;
                    while ($fila = $resultadoB->fetch_assoc()) {
                        if ($fila['Autor'] == $autor) {
                            $Titulos = $fila['Titulo'];
                            $imagenes_total = "../../Blogs/predeterminado.jpg";
                ?>
                            <div class="row" style="background: #EEEEEE; border-radius: 15px; padding: 7px;">

                                <div class="col-3" style="margin:  auto;">
                                    <img src="<?php echo $imagenes_total ?>" width="90%" height="190em" style="border-radius: 100%; ">
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <p style="text-align: justify; text-align: center; margin: 0 auto;"><b><?php echo $Titulos ?></b></p>
                                </div>

                                <div class="col-5">
                                    <p class="cuerpo" type="text" readonly><?php echo $fila['Cuerpo'] ?></p>
                                    <form action="Acciones_Blogs.php" method="post">
                                        <input type="hidden" value="<?php echo $fila['id'] ?>" name="acceso"> <!-- Campo oculto con el ID del blog -->
                                        <a href="../php/Eliminar.php?acceso=<?php echo $fila['id'] ?>&accion=eliminar" class="leer" style="text-decoration: none; color: #000000; text-align: center;">Eliminar</a>

                                        <a class="leer" href=" Acciones_Blogs.php?acceso=<?php echo $fila['id'] ?>&m=1"> editar</a>
                                    </form>

                                </div>
                            </div>

                            <br>

                    <?php }
                    }
                } else { ?>
                    <div class="container">
                        <center>
                            <p>No hay Articulos registrados</p>
                        </center>
                    </div>
                <?php  }
                $conexion->close();
                ?>
            </div>
        </main>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/bootstrap.bundle.min.js"></script>
<script src="../../control/actualizar.js"></script>
</html>