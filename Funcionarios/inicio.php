<?php
$envios = false;
$recomendacion = false;
session_start();

if (!isset($_SESSION['Email'])) {

  header("Location: ../index.php");
} else {
  $user = $_SESSION['Email'];
  $usuario = $user;
  $dominio_especifico = "exploraeducolombia.com.co";
  if (strpos($usuario, "@" . $dominio_especifico) == false) {

    echo '<script>
        alert("Acceso Denegado");
        location.href = "../paginas/inicio.php";
        </script>';
  } else {
    $usuario = $_SESSION['contra'];
  }
}
// //Conexion base de datos
include('../php/Conexion_bd.php');
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

$conexion->close();
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
            width: 100%;
          ">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicio.php"><img src="../imagen/Logo/Icono.svg" alt="Logo" width="60px" style="border-radius: 100%" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pagina/Blogs.php">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pagina/Acuerdos.php">Acuerdos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="pagina/Convenios.php">Convenios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pagina/Ayuda.php">Ayuda</a>
              </li>
            </ul>


            <form class="d-flex ">
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll align-items-center" style="--bs-scroll-height: 100px">
                  <li class="nav-item">
                    <label><?php echo $usuario ?></label>
                  </li>&ensp;&ensp;
                  <li class="nav-item">
                    <?php if (!$envios) { ?>
                      <a class="nav-link" href="pagina/N_Experiencia.php"><img src="imagenes/sin notificacion.svg" alt="Notificaciones" title="sin Experiencias" width="30px"></a>
                    <?php } else { ?>
                      <a class="nav-link" href="pagina/N_Experiencia.php"><img src="imagenes/notificacion.svg" alt="Notificaciones" title="Nueva Experiencias" width="30px"></a>
                    <?php } ?>
                  </li>&ensp;&ensp;
                  <li class="nav-item">
                    <?php if ($recomendacion) { ?>
                      <a class="nav-link" href="pagina/N_Recomendacion.php"><img src="imagenes/Recomendaciones.svg" alt="recomendaciones" title="Nueva Recomendación" width="30px"></a>
                    <?php } else { ?>
                      <a class="nav-link" href="pagina/N_Recomendacion.php"><img src="imagenes/Sin recomendaciones.svg" alt="recomendaciones" title="Sin Recomendaciones" width="30px"></a>
                    <?php } ?>
                  </li>
                  &ensp;&ensp;
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../php/cerrar.php"><img src="imagenes/salir.png" alt="Salir" title="Cerrar sesión  "></a>
                  </li>
                  &ensp;&ensp;
                </ul>
              </div>
          </div>
      </nav>
    </header>
    <main>
      <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f6ee">
        <br><br><br><br>
        <center>
          <h4>EXPLORACIÓN PARA LA EDUCACION EN COLOMBIA <br>(EXPLORA EDU)</h4>
        </center>
        <!-- Inica Carrusel -->
        <div class="modal-fullscreen-sm-don">

          <div id="carouselExampleAutoplaying" style="border-radius: 11px; background: transparent; height: 30em; width: 90%; margin: auto; box-shadow: 0 8px 32px 0 rgba(46, 46, 46, 0.66);" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="border-radius: 11px; width: 100%; height: 30em; margin: auto">
              <div class="carousel-item active">
                <img src="imagenes/carrusel/carrusel (1).jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagenes/carrusel/carrusel (2).jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagenes/carrusel/carrusel (3).jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagenes/carrusel/carrusel (4).jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagenes/carrusel/carrusel (5).jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagenes/carrusel/carrusel (6).jpg" class="d-block w-100" alt="..." />
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
          <div class="container" style="width: 80%; text-align: justify; padding-left: 80px; padding-top: 60px; padding-right: 80px; padding-bottom: 20px; background: #ffffff; border-radius: 15px;">
            <p>
              &emsp; Queridos colegas de <b>Explora Edu</b>, cada uno de ustedes juega un papel fundamental en nuestro
              viaje
              hacia el éxito. En estos momentos, nos encontramos en una etapa emocionante de nuestra empresa, donde
              estamos expandiendo nuestros horizontes y llevando la educación experiencial a nuevas alturas en Colombia.
              Aunque actualmente nos enfocamos en dos departamentos, nuestro sueño es llegar a cada rincón del país,
              impactando positivamente la vida de estudiantes y educadores a lo largo y ancho de Colombia. Cada día, al
              trabajar juntos, estamos más cerca de hacer realidad este sueño. Vuestra dedicación, pasión y compromiso
              con nuestra misión de proporcionar experiencias educativas transformadoras son la fuerza impulsora que nos
              impulsa a seguir adelante.
            </p>
            <p>
              &emsp; Estimados compañeros de equipo, en <b>Explora Edu</b> estamos escribiendo una historia única y
              emocionante
              en el mundo de los viajes educativos en Colombia. Aunque actualmente nuestra presencia se concentra en dos
              departamentos, nuestra visión es ambiciosa y nuestro potencial es ilimitado. Cada uno de ustedes es un
              pilar fundamental en este viaje hacia el éxito. Vuestra creatividad, dedicación y espíritu colaborativo
              son la esencia misma de lo que somos como empresa. A medida que enfrentamos desafíos y superamos
              obstáculos, recordemos siempre nuestro propósito: llevar el aprendizaje más allá de las aulas y
              transformar vidas a través de experiencias enriquecedoras. Sigamos trabajando juntos con determinación y
              confianza, sabiendo que juntos podemos alcanzar nuevas alturas y cumplir nuestros sueños más audaces. ¡El
              futuro de <b>Explora Edu</b> está en nuestras manos, y juntos podemos hacerlo realidad!</p>
          </div>
          <div class="continer" style="width: 85%; margin: auto;">
            <br><br>
            <center>
              <h5><b>Empleados del mes</b></h5>
            </center><br><br>

            <div class="row">
              <div class="col-4">
                <div class="card" style="width: 18rem;">
                  <img src="empleados del mes/empleado del mes (1).jpg" width="100%" class="card-img-top" alt="Empleados del mes">
                  <div class="card-body">
                    <h4 class="card-text">Ilder Gutierrez</h4>
                    <p class="card-text">¡Felicidades a Ilder Gutierrez por ser nuestro empleado destacado del mes! Tu
                      dedicación y excelencia en el trabajo son ejemplares. ¡Gracias por tu arduo trabajo y contribución
                      al éxito de nuestro equipo!</p>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card" style="width: 18rem;">
                  <img src="empleados del mes/empleado del mes (2).jpg" width="100%" class="card-img-top" alt="Empleados del mes">
                  <div class="card-body">
                    <h4 class="card-text">Ana Sidray</h4>
                    <p class="card-text">Ana Sidray, ¡eres nuestra estrella del mes! Tu compromiso y profesionalismo son
                      inspiradores. ¡Gracias por tu constante dedicación y por ser un ejemplo para todos nosotros!</p>
                  </div>
                </div>

              </div>
              <div class="col-4">
                <div class="card" style="width: 18rem;">
                  <img src="empleados del mes/empleado del mes (3).jpg" width="100%" class="card-img-top" alt="Empleados del mes">
                  <div class="card-body">
                    <h4 class="card-text">Tatiana Rodriguez</h4>
                    <p class="card-text">Tatiana Rodríguez, ¡enhorabuena por ser nuestra empleada sobresaliente este
                      mes! Tu pasión y determinación son inigualables. ¡Gracias por tu increíble contribución y por
                      elevar el estándar de excelencia en nuestro equipo!</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <br><br><br>
    </main>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../Js/bootstrap.bundle.min.js"></script>

</html>