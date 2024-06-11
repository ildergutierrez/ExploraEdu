<?php
session_start();

if (isset($_SESSION['from_redirect']) && $_SESSION['from_redirect'] === true) {
    $nommbre = $_GET['nommbre'];
    $descripcion = $_GET['descripcion'];
    $acceso = $_GET['acceso'];
    $id = $_GET['id'];


    unset($_SESSION['from_redirect']);
} else {
    $nommbre = $_POST['acceso'];
    if ($nommbre == null) {
        echo '<script>location.href = "experiencia.php";</script>';
    }
    $descripcion = $_POST['Descrip'];
    $acceso = $_POST['ruta'];
    $id = $_POST['id_experiencia'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comentarios</title>
    <link rel="icon" href="../imagen/Logo/Icono.svg" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;

    }

    .floating-button {

        position: fixed;
        top: 25%;
        left: 7.5%;
    }
</style>

<body style="background: rgb(61, 83, 82)">
    <div class="container-fluid" style="padding: 0">
        <!-- verifica si inicio o no sesión-->
        <?php
        // session_start();
        $user = "User";
        if (!isset($_SESSION['Email'])) {

            $usuario_iniciado = false;
        } else {
            $usuario_iniciado = true;
            $user = $_SESSION['Email'];
        }
        ?>
        <!-- Fin de si inicio o no sesión -->

        <header>
            <nav class="navbar navbar-expand-lg" style="background: #E1F6F7; position: fixed; z-index: 100;width: 100%; ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../imagen/Logo/Icono.svg" alt="" width="80px" style="border-radius: 100%" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="destinos.php">Destinos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paquetes y programas.php">Paquetes y programas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="experiencia.php">Experiencias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recursos educativos.php">Recursos Educativos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blogs.php">Blog</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Nosotros
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="mision.php">Misión</a></li>
                                    <li>
                                        <a class="dropdown-item" href="vision.php">Visión</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="valores.php">Valores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="Enfoque.php">Enfoque diferencial</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                        if ($usuario_iniciado) { ?>
                            <!-- Mostrar imagen y acordeón si el usuario ha iniciado sesión -->

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#opcionesUsuario" aria-controls="opcionesUsuario" aria-expanded="false" aria-label="Toggle navigation">
                                Opciones
                            </button>
                            <div class="collapse navbar-collapse" id="opcionesUsuario">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <!-- Opciones del usuario desplegables en el acordeón -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="../imagen/panel-de-control.png" alt="Configuracion" title="Configuración" width="30px">
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="perfil.php">Configuración</a></li>
                                            <li>
                                                <a class="dropdown-item" href="experiencia usuario.php">Experiencias</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="recomendaciones usuario.php">Recomendación</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../php/cerrar.php">Cerrar Sesión</a>
                                            </li>
                                        </ul>
                                    </li>&ensp;&ensp;&ensp;
                                    <li class="nav-item">

                                        <?php
                                        include('../php/Buscar_imagen.php');

                                        $ruta_imagen_predeterminada = "../imagen/4.png";


                                        if (isset($nombre_imagen) && !empty($nombre_imagen)) {

                                            $ruta_imagen_perfil = "../img_User/" . $nombre_imagen;

                                            if (file_exists($ruta_imagen_perfil)) {

                                                echo '<img src="' . $ruta_imagen_perfil . '" alt="Perfil" height="50px" width="50px" style="border-radius: 60%; border: solid 1px #000000;">';
                                            } else {

                                                echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil" height="70px" width="60px" style="border-radius: 60%; border: solid 1px #000000;">';
                                            }
                                        } else {

                                            echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil"  height="70px" width="60px" style="border-radius: 50%; border: solid 1px #000000;">';
                                        }
                                        ?>
                                    </li>&ensp;&ensp;&ensp; &ensp;
                                </ul>
                            </div>
                        <?php } else { ?>
                            <!-- Mostrar botón de inicio de sesión si el usuario no ha iniciado sesión -->
                            <form class="d-flex" role="search">
                                <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Iniciar Sesión
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </nav>
            <!-- Fin menú -->
        </header>
        <main>
            <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f8ff">
                <!-- Boton flotante -->
                <a href="experiencia.php"><button class="btn btn-primary floating-button" title="Volver"><img src="../imagen/anterior.png" width="20px" alt="Atras"></button></a>
                <!-- fin del boton  -->

                <!-- Ventana modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><img src="imagen/Logo/Icono.svg" alt="" width="80px">Iniciar sesión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../php/sesion.php" method="post">
                                    <input type="hidden" value="../Paginas/experiencia.php" name="link">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                                        <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" name="user">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                        <input required type="password" minlength="8" class="form-control" id="exampleInputPassword1" placeholder="password" name="pass">
                                        <label class="btn btn-light" onclick="RPassword()"><img src="../imagen/ojo.png" id="toggleImage" alt="Toggle Password Visibility" width="30px"></label>
                                    </div>

                                    <center> <button type="submit" class="btn btn-primary">Iniciar sesión</button> </center> <br>
                                    <p><a href="Recuperar_contraseña.php">olvide mi contraseña</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin ventan Modal -->
                <!-- Carrusel y  descripcion -->
                <div class="container" style="text-align: justify; padding: 80px; text-align: 1 em;">
                    <br><br>
                    <center>
                        <h1><?php echo $nommbre ?></h1>
                    </center>
                    <br />
                    <?php

                    $contador_filas = 0;

                    $contador_carruseles = 0;

                    $carpeta_imagenes = $acceso;

                    $imagenes = glob($carpeta_imagenes . '/*.{JPG,PNG, JPEG,GIF,WEBP,webp,jpg,jpeg,png,gif}', GLOB_BRACE);

                    if ($imagenes) {

                        $contador_filas++;

                        $contador_carruseles++;
                    } ?>
                    <div style="border-radius: 15px; background: #C7E1DF; width: 100%;">
                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div style="width: 80%; margin: auto;" id="carousel_<?php echo $contador_carruseles; ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" style="height: 30em; border-radius: 5%;">
                                        <?php
                                        // Mostrar cada imagen en el carrusel
                                        foreach ($imagenes as $key => $imagen) {
                                            $active = ($key === 0) ? 'active' : '';
                                        ?>
                                            <div class="carousel-item <?php echo $active; ?>">
                                                <img src="<?php echo $imagen; ?>" class="d-block w-100" alt="..." style="width: 100%; height: 30em;">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_<?php echo $contador_carruseles; ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_<?php echo $contador_carruseles; ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" style="text-align: justify; line-height: 1.5em;">
                                <br>
                                <p> <?php echo $descripcion ?></p>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <!-- Fin de Carrusel y descripcion -->

                    <!-- Comentarios Guardados y/o escribir cometarios -->
                    <br /><br />
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <br>
                            <div>
                                <?php
                                include('../php/Conexion_bd.php');

                                $id_experiencia = $id;

                                $sql = "SELECT * FROM Comentarios WHERE id_experiencia = '$id_experiencia'";
                                $resultado = $conexion->query($sql);


                                if ($resultado) {

                                    if ($resultado->num_rows > 0) {

                                        while ($fila = $resultado->fetch_assoc()) { ?>

                                            <div class="container">
                                                <?php echo "<div>"; ?>
                                                <label for="" style="width: 100%; border-radius: 15px; background: #C7E1DF; text-align: justify; padding: 10px;" class="form-label">
                                                    <b><?php echo $fila['usuario'] ?></b>: <?php echo $fila['comentario'] ?>
                                                </label>
                                                <?php echo "</div>"; ?>
                                            </div>
                                <?php }
                                    } else {

                                        echo "Sin comentarios.";
                                    }
                                } else {

                                    echo "Error al consultar la base de datos.";
                                }
                                ?>
                                <br>

                                <?php if ($usuario_iniciado) { ?>

                                    <form action="../php/comentarios_bd.php" method="post">
                                        <div class="md-2">

                                            <input name="id_exp" type="hidden" value="<?php echo $id ?>">
                                            <input name="usuarios" style="width: 50%; border: none; background: transparent; font-weight: bold;" type="text" readonly value="<?php echo $user ?>"> <br>
                                            <div id="contador" style="float: inline-end;">Caracteres restantes: 600</div>
                                            <textarea name="comentarios" required style="height: 70px; resize: none;" maxlength="600" oninput="contarCaracteres()" placeholder="Tu comentario: (Máximo 600 caracteres incluyendo espacios)" class="form-control" id="commentText" rows="3"></textarea>

                                        </div>
                                        <input name="acceso" type="hidden" value="<?php echo $nommbre ?>">
                                        <input name="Descrip" type="hidden" value="<?php echo $descripcion ?>">
                                        <input name="ruta" type="hidden" value="<?php echo $acceso ?>">
                                        <br>
                                        <button type="submit" class="btn btn-info float-end">Publicar Comentario</button>
                                    </form>



                                <?php } ?>
                            </div>

                            <div class="col-mb-3"></div>
                        </div>
                        <!-- Fin de la sección de los comentarios -->
                    </div>
                </div>
            </div>
        </main>
        <footer class="container text-light py-4" style="background: #575764;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Redes Sociales -->
                    <div class="footer-item">
                        <h5>Redes Sociales</h5>
                        <!-- Agrega aquí tus iconos de redes sociales -->
                        <img src="../imagen/footer/facebook.png" alt="facebook" width="50" class="me-2">
                        <img src="../imagen/footer/instagram.png" alt="instagram" width="50" class="me-2">
                        <img src="../imagen/footer/youtube.png" alt="youtube" width="50" class="me-2">
                        <img src="../imagen/footer/logotipos.png" alt="X" width="50" class="me-2">
                    </div>
                    <!-- Contacto -->
                    <div class="footer-item" style="margin-bottom: 1rem; margin-bottom: 0.5rem;">
                        <h5>Contacto</h5>
                        <div>
                            <div>
                                <p class="mb-1"> <img src="../imagen/footer/e-mail.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 100px;">
                                    Explora-Edu@Exploraeducolombia.com.co</p>
                                <p class="mb-1"> <img src="../imagen/footer/telefono.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 20px;">
                                    565-1219</p>
                                <p class="mb-1"> <img src="../imagen/footer/whatsapp-7466235.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 20px;">
                                    312-777- 9865</p>
                                <p class="mb-1"> <img src="../imagen/footer/ubicacion_l.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 30px;">
                                    Aguachica - Cesar</p>
                                <p class="mb-1"> &ensp; &ensp; &ensp; Dirección: Cra 40 3N 22</p>
                            </div>
                        </div>
                    </div>
                    <!-- Calificación -->
                    <div class="footer-item">
                        <h5>Calificación</h5>
                        <img class="mb-1"> <img src="../imagen/footer/5 estrella.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 100px;">
                    </div>
                </div>
                <!-- Logo -->
                <div class="text-center mt-4">
                    <img src="../imagen/Logo/icono1.webp" alt="Logo" width="100px" class="img-fluid" style="border-radius: 100%;">
                </div>
            </div>
        </footer>



        <!-- Scrips -->

        <script>
            function contarCaracteres() {
                var comentario = document.querySelector('textarea[name="comentarios"]').value;
                var longitud = comentario.length;
                var maximo = 600;
                var restantes = maximo - longitud;
                var contador = document.getElementById("contador");
                contador.textContent = "Caracteres restantes: " + restantes;
            }
        </script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../Js/bootstrap.bundle.min.js"></script>
        <script src="../control/password.js"></script>
    </div>
</body>

</html>