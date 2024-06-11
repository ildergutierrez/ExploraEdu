<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blogs</title>
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

  .cuerpo {
    width: 100%;
    height: 10.9em;
    overflow: hidden;
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

<body style="background: rgb(61, 83, 82)">
  <div class="container-fluid" style="padding: 0">

    <!-- verifica si inicio o no sesión-->
    <?php
    session_start();

    if (!isset($_SESSION['Email'])) {

      $usuario_iniciado = false;
    } else {
      $usuario_iniciado = true;
    }
    ?>
    <!-- Fin de si inicio o no sesión -->

    <header>
      <nav class="navbar navbar-expand-lg" style="background: #E1F6F7; position: fixed; z-index: 100;width: 100%;">
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

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#opcionesUsuario" aria-controls="opcionesUsuario" aria-expanded="false" aria-label="Toggle navigation">
                Opciones
              </button>
              <div class="collapse navbar-collapse" id="opcionesUsuario">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

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
                  <div class="mb-3">
                    <input type="hidden" value="../Paginas/blogs.php" name="link">
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


        <div class="container" style="text-align: justify; padding: 80px; text-align: 1 em;">
          <center>
            <br><br>
            <h1>Blogs Explora Edu</h1>
          </center>
          <br />
          <?php
          include('../php/Conexion_bd.php');
          $sql = "SELECT * FROM blogs";
          $resultado = $conexion->query($sql);
          if ($resultado && $resultado->num_rows > 0) {

            $contador_filas = 0;

            $contador_carruseles = 0;

            while ($fila = $resultado->fetch_assoc()) {

              $Titulos = $fila['Titulo'];

              $imagenes_total = "../Blogs/predeterminado.jpg";

          ?>
              <div class="row" style="background: #E9F5F3; border-radius: 15px; padding: 7px;">

                <div class="col-3" style="margin:  auto;">
                  <img src="<?php echo $imagenes_total ?>" width="90%" height="190em" style="border-radius: 100%; ">
                </div>
                <div class="col-4 d-flex align-items-center">
                  <p style="text-align: justify; text-align: center; margin: 0 auto;"><b><?php echo $Titulos ?></b></p>
                </div>

                <div class="col-5">
                  <p class="cuerpo" type="text" readonly><?php echo $fila['Cuerpo'] ?></p>
                  <form action="leer blogs.php" method="post">
                    <input type="hidden" value="<?php echo $fila['id'] ?>" name="acceso">
                    <button class="leer">Saber mas...</button>
                  </form>
                </div>
              </div>

              <br>

          <?php }
          }
          $conexion->close();
          ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <script src="../control/password.js"></script>
  </div>
</body>

</html>