<?php
$envios = false;
$recomendacion = false;
$imagen = "";
$datos_codificados = "";
session_start();
if (isset($_GET['id'])) {
    // Recupera el valor codificado de 'datos'
    $datos_codificados = $_GET['id'];

    // Decodifica los datos
    $datos_decodificados = base64_decode($datos_codificados);
}
if ($datos_codificados == null) {
    echo '<script>
    alert("No se encontro ruta");
    location.href = "../inicio.php";
    </script>';
    exit();
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
include('../../php/Conexion_bd.php');
$consulta = "SELECT * FROM envios WHERE id='$datos_decodificados'";
$resultado = $conexion->query($consulta);
if ($resultado) {

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $qerry = "UPDATE `envios` SET `Visto`='si' WHERE  `id`=$datos_decodificados";
        $ejecutar = mysqli_query($conexion, $qerry);
        $conexion->close();
    } else {
        header("Location: N_Experiencias.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevas Experiencias</title>
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
        background-image: url(../imagenes/globos.svg);
        background-attachment: fixed;
        /* mantiene el fondo en una posicion*/
    }
</style>

<body>

    <!-- Ventana modal -->

    <div class="modal fade modal-lg" id="imagenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <?php if ($imagen != "")
                        echo "<img src='$imagen' class=img-fluid' alt='Imagen'>";
                    else { ?>
                        <img src="..." class="img-fluid" alt="Imagen">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- fin ventan Modal -->
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
            <div class="container-fluid">
                <br><br><br><br>
                <div class="container-lg">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="row" style="padding-top: 20px; color: #000; background-color: rgba(238, 238, 238, 0.8); border-radius: 15px;">
                                <div class="col-1" style="padding-bottom:15px; "><a href="N_Experiencia.php"><img src="../imagenes/anterior.png" alt="volver" width="50%"></a></div>
                                <div class="col-8" style="text-align: center;"><b> <?php echo $fila['Asunto'] ?></b></div>
                                <div class="col-3" style="text-align: center; font-size: 12px;">
                                    <div class="row">
                                        <div class="col"> <img src="../imagenes/guardar.png" alt="Guardar" title="Descargar" width="35%" style="float: inline-end;"></div>
                                        <div class="col"><a href="../php/Elimira_Nuevas.php?accion=Experiencias&acceso=<?php echo $datos_decodificados ?>"> <img src="../imagenes/Basura.png" alt="Eliminar" title="Elimnar" width="35%" style="float: left;"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="row" style="padding-top: 20px; color: #000; background-color: rgba(238, 238, 238, 0.8); border-radius: 15px;">
                                <div class="col-12" style="text-align: justify;">
                                    <div class="container">
                                        <p> <?php echo $fila['Comentarios'] ?></p> <br>
                                        <hr style=" border: none; border-top: 1px solid #000000; height: 1px; width: 90%;  margin: 20px auto;">
                                        <br>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <?php
                                            $contador = 0;
                                            $elementos = glob('../' . $fila['Carpeta'] . '/*');
                                            $num_elementos = count($elementos);
                                            echo "<div class='row'>";
                                            foreach ($elementos as $elemento) {
                                                $foto = '../' . $fila['Carpeta'] . '/' . basename($elemento);

                                                if ($contador == 0) {
                                                    echo "<br> <br> <br> <br><br> <br> <div class='col-4'>";
                                                    echo "<img src='$foto' class='imagen-modal' width='100%' alt='...' data-toggle='modal' data-target='#imagenModal' data-imagen='$foto'>";

                                                    echo "</div>";
                                                }
                                                if ($contador == 1) {
                                                    echo "<div class='col-4'><img src='$foto' class='imagen-modal' width='100%' alt='...' data-toggle='modal' data-target='#imagenModal' data-imagen='$foto' ></div>";
                                                }
                                                if ($contador == 2) {

                                                    echo "<div class='col-4'><img src='$foto' alt='...' class='imagen-modal' width='100%' data-toggle='modal' data-target='#imagenModal' data-imagen='$foto' ></div>";
                                                    $contador = -1;
                                                    echo "<br> <br> ";
                                                }
                                                $contador++;
                                            }
                                            echo "</div>";
                                            ?>
                                            <br> <br>
                                            <hr style=" border: none; border-top: 1px solid #000000; height: 1px; width: 90%;  margin: 20px auto;">
                                            <p> Enviado por: <b> <?php echo $fila['Usuario'] ?></b></p>
                                            <p>Fecha: <?php echo $fila['Fecha'] ?></p>
                                            <br> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(".imagen-modal").click(function() {
            var imagenSrc = $(this).data('imagen');
            $(".modal-body img").attr("src", imagenSrc);
            $("#imagenModal").modal('show');
        });
    });
</script>
<script src="../../control/actualizar.js"></script>

</html>