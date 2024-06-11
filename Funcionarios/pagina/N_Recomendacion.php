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

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevas Recomendaciones</title>
    <link rel="icon" href="../../imagen/Logo/Icono.svg" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        background: #DEE8E7;
        background-image: url(../imagenes/fondo_r.svg);
        background-attachment: fixed;
        /* mantiene el fondo en una posicion*/
    }

    .column-padding {
        padding: 10px;

    }

    .boton {
        margin: auto;
        border: solid 1px #000000;
        background: #ffffff;
        width: 100%;
        padding: 8px;
        border-radius: 10px;
        box-shadow: 0 3px 32px 0 rgba(0, 0, 0, 0.76);
    }

    .boton:hover {
        background: #DEE8E7;
    }

    a {
        text-decoration: none;
        color: #000000;
    }
</style>

<body>
    <div class="container-fluid" style="padding: 0;">
        <header>
            <nav class="navbar navbar-expand-lg" style="
            background: #E8DFC0  ;
            position: fixed;
            z-index: 100;
            width: 100%;
          ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="inicio.php"><img src="../../imagen/Logo/Icono.svg" alt="Logo" width="60px" style="border-radius: 100%" /></a>
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
            <br><br><br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10" style="padding-top: 20px; color: #ffffff; background-color: rgba(238, 238, 238, 0.2); border-radius: 15px;">
                        <div class="md">
                            <table class="table  table-striped" id="correo" style="border-radius: 5px;">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Asunto</th>
                                        <th>Fecha</th>

                                    </tr>
                                </thead>
                                <tbody id="cuerpo_correo"></tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <br><br><br>
        </main>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/bootstrap.bundle.min.js"></script>
<!-- Jquerry -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- data table -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../../control/actualizar.js"></script>
<script src="../../control/recomendacion.js"></script>

</html>