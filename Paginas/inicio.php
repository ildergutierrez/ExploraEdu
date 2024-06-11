<?php
session_start();

if (!isset($_SESSION['Email'])) {
  echo '<script>
  window.location="../index.php";
  </script>';
  exit();
} else {
  $usuario_iniciado = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Explora Edu</title>
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
</style>

<body style="background: rgb(61, 83, 82)">
  <div class="container-fluid" style="padding: 0">
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
                    <!-- Configuracion inicio de sesion -->
                    <?php
                    include('../php/Buscar_imagen.php');

                    $ruta_imagen_predeterminada = "../imagen/4.png";


                    if (isset($nombre_imagen) && !empty($nombre_imagen)) {

                      $ruta_imagen_perfil = "../img_User/" . $nombre_imagen;


                      if (file_exists($ruta_imagen_perfil)) {

                        echo '<img src="' . $ruta_imagen_perfil . '" alt="Perfil" height="50px" width="50px" style="border-radius: 60%; border: solid 1px #000000;">';
                      } else {

                        echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil" height="50px" width="50px" style="border-radius: 60%; border: solid 1px #000000;">';
                      }
                    } else {

                      echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil" height="50px" width="50px" style="border-radius: 50%; border: solid 1px #000000;">';
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
          <!-- fin de la configuarcion -->
        </div>
      </nav>
      <!-- Fin menú -->
    </header>
    <main> <br><br><br><br>
      <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f8ff">
        <!-- Inica Carrusel -->
        <div class="modal-fullscreen-sm-don">
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="border-radius: 11px; width: 95%; margin: auto">
              <div class="carousel-item active">
                <img src="../imagen/slider/sleider (1).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (2).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (3).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (4).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (5).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (6).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (7).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../imagen/slider/sleider (8).JPG" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- fin del carrusel -->

          <div class="container" style="text-align: justify; padding: 80px;">
            <br />
            <center>
              <h1>Bienvenidos</h1>
            </center>
            <br />
            <center>
              <h4>
                ¡Estás a punto de emprender un viaje educativo inolvidable!
              </h4>
            </center>
            <br /><br />
            &ensp; Ahora que has dado el primer paso y has iniciado sesión en
            <strong>Explora Edu</strong>, te damos la bienvenida a un mundo de
            oportunidades educativas sin límites. Prepárate para explorar una
            amplia gama de destinos, paquetes y recursos educativos
            cuidadosamente seleccionados para enriquecer tu experiencia
            académica. <br /><br />
            &ensp; Desde laboratorios de investigación de última generación
            hasta empresas pioneras en sus campos, cada lugar que te ofrecemos
            ha sido diseñado para inspirar, educar y estimular tu curiosidad.
            Sumérgete en entornos dinámicos y estimulantes donde podrás aprender
            de primera mano sobre los avances científicos, tecnológicos y
            empresariales que están dando forma al mundo que nos rodea.
            <br /><br />
            &ensp; En <strong>Explora Edu</strong>, entendemos que el
            aprendizaje va más allá de los libros de texto y las conferencias en
            el aula. Es un viaje de descubrimiento y crecimiento personal que se
            nutre de experiencias auténticas y significativas. Por eso, te
            invitamos a aprovechar al máximo cada oportunidad que te ofrecemos
            para ampliar tus horizontes, conectar con expertos en tu campo de
            interés y adquirir habilidades prácticas que te prepararán para el
            éxito en el futuro. <br /><br />

            &ensp; ¡Empieza tu aventura educativa hoy mismo con
            <strong>Explora Edu</strong> y descubre un mundo de posibilidades
            que te espera!
          </div>

        </div>
    </main>
    <footer class="container text-light py-4" style="background: #575764;">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <!-- Redes Sociales -->
          <div class="footer-item">
            <h5>Redes Sociales</h5>
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
    <!-- fin de script boostrap -->
  </div>
</body>

</html>