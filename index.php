<?php
session_start();
$dominio_especifico = "exploraeducolombia.com.co";
if (isset($_SESSION['Email'])) {
  if (strpos($_SESSION['Email'], "@" . $dominio_especifico) == false) {
    header("Location: paginas/inicio.php");
  } else {
    header("location: Funcionarios/inicio.php");
  }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Explora Edu</title>
  <link rel="icon" href="imagen/Logo/Icono.svg" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
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
            <img src="imagen/Logo/Icono.svg" alt="" width="80px" style="border-radius: 100%" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Paginas/destinos.php">Destinos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Paginas/paquetes y programas.php">Paquetes y programas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Paginas/experiencia.php">Experiencias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Paginas/recursos educativos.php">Recursos Educativos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Paginas/blogs.php">Blog</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Nosotros
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Paginas/mision.php">Misión</a></li>
                  <li>
                    <a class="dropdown-item" href="Paginas/vision.php">Visión</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="Paginas/valores.php">Valores</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="Paginas/Enfoque.php">Enfoque diferencial</a>
                  </li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <label class="btn btn-outline-info" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Iniciar Sesión
              </label>
            </form>
          </div>
        </div>
        <!-- </div> -->
      </nav>
      <!-- Fin menú -->
    </header>
    <main>
      <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f8ff">
        <br><br><br><br>
        <!-- Inica Carrusel -->
        <div class="modal-fullscreen-sm-don">
          <div id="carouselExampleAutoplaying" style=" width: 90%; margin: auto;" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="border-radius: 11px; width: 100%; margin: auto">
              <div class="carousel-item active">
                <img src="imagen/slider/sleider (1).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (2).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (3).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (4).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (5).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (6).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (7).JPG" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="imagen/slider/sleider (8).JPG" class="d-block w-100" alt="..." />
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
          <!-- Ventana modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><img src="imagen/Logo/Icono.svg" alt="" width="80px">Iniciar sesión</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Contenido del formulario de inicio de sesión -->
                  <form action="php/sesion.php" method="post">
                    <div class="mb-3">
                      <input type="hidden" value="../Paginas/inicio.php" name="link">
                      <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                      <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" name="user">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                      <input required type="password" minlength="8" class="form-control" id="exampleInputPassword1" placeholder="password" name="pass">
                      <label class="btn btn-light" onclick="RPassword()"><img src="imagen/ojo.png" id="toggleImage" alt="Toggle Password Visibility" width="30px"></label>
                    </div>

                    <center> <button type="submit" class="btn btn-primary">Iniciar sesión</button> </center> <br>
                    <p><a href="Paginas/Recuperar_contraseña.php">olvide mi contraseña</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- fin ventan Modal -->

          <div class="container" style="text-align: justify; padding: 80px;">
            <br /><br />
            <center>
              ¡Bienvenido a <strong>Explora Edu</strong>, tu plataforma de
              exploración educacional!
            </center>
            <br /><br />
            &ensp; En <strong>Explora Edu</strong>, nos enorgullece ser tu
            aliado en el viaje hacia una educación más experiencial y
            enriquecedora. Nos dedicamos a facilitar la toma de decisiones de
            los centros educativos y universidades, ofreciendo una valiosa guía
            sobre los lugares idóneos para realizar visitas científicas y
            empresariales en las vibrantes regiones de Colombia (Actualmente:
            <em>Antioquia y Santander</em>). <br /><br />
            &ensp; Nuestra misión es trascender las fronteras de las aulas y
            abrir las puertas del aprendizaje a través de experiencias prácticas
            y significativas. Por eso, hemos reunido una amplia gama de destinos
            educativos cuidadosamente seleccionados, que van desde laboratorios
            de investigación de vanguardia hasta empresas innovadoras en
            diversos sectores. Cada destino ha sido elegido con el propósito de
            ofrecer a estudiantes y educadores la oportunidad única de explorar,
            aprender y conectar con el mundo que los rodea. <br /><br />
            &ensp; En <strong>Explora Edu</strong>, creemos que la educación va
            más allá de los libros de texto y las clases magistrales. Es una
            experiencia dinámica y multifacética que se nutre de la interacción
            con el entorno, el intercambio de ideas y la experimentación
            práctica. Con nuestra plataforma, queremos inspirar y empoderar a
            las instituciones educativas a ampliar sus horizontes y llevar el
            aprendizaje fuera de las cuatro paredes del aula.

            <br /><br /><br />
            ¡Descubre con nosotros las infinitas posibilidades que ofrece
            <strong>Explora Edu</strong> y prepárate para embarcarte en un viaje
            educativo que transformará tu manera de aprender y enseñar!
            <br /><br />
          </div>
          <!-- Registro -->
          <div class="container" style="border-radius: 10%; background: #eff2f3;">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="card mt-5" style=" border-radius: 15px;">
                  <div class="card-body" style="border: solid 1px #585b5c; background: #c6f1ec; box-shadow: 0 8px 32px 0 rgba(46, 46, 46, 0.66);">
                    <h5 class="card-title text-center" style="font-size: 40px;">Registro</h5>
                    <form action="php/Registro.php" method="post">
                      <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombreCompleto" required placeholder="Ingresa tu nombre completo" name="Nombre_completo">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required placeholder="Ingresa tu email" name="correo">
                      </div>
                      <div class="mb-3">
                        <label label for="Departamentos" class="form-label">Departamento de Colombia</label>
                        <select id="departamentos" name="departamento" class="form-select w-100" required>
                          <option value="">Selecciona un departamento</option>
                          <option value="Amazonas">Amazonas</option>
                          <option value="Antioquia">Antioquia</option>
                          <option value="Arauca">Arauca</option>
                          <option value="Atlántico">Atlántico</option>
                          <option value="Bolívar">Bolívar</option>
                          <option value="Boyacá">Boyacá</option>
                          <option value="Caldas">Caldas</option>
                          <option value="Caquetá">Caquetá</option>
                          <option value="Casanare">Casanare</option>
                          <option value="Cauca">Cauca</option>
                          <option value="Cesar">Cesar</option>
                          <option value="Chocó">Chocó</option>
                          <option value="Córdoba">Córdoba</option>
                          <option value="Cundinamarca">Cundinamarca</option>
                          <option value="Guainía">Guainía</option>
                          <option value="Guaviare">Guaviare</option>
                          <option value="Huila">Huila</option>
                          <option value="La Guajira">La Guajira</option>
                          <option value="Magdalena">Magdalena</option>
                          <option value="Meta">Meta</option>
                          <option value="Nariño">Nariño</option>
                          <option value="Norte de Santander">Norte de Santander</option>
                          <option value="Putumayo">Putumayo</option>
                          <option value="Quindío">Quindío</option>
                          <option value="Risaralda">Risaralda</option>
                          <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                          <option value="Santander">Santander</option>
                          <option value="Sucre">Sucre</option>
                          <option value="Tolima">Tolima</option>
                          <option value="Valle del Cauca">Valle del Cauca</option>
                          <option value="Vaupés">Vaupés</option>
                          <option value="Vichada">Vichada</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="Ciudad" class="form-label">Ciudad / Municipio</label>
                        <input type="Ciudad" class="form-control" id="municipio" required placeholder="Ciudad / municipio" name="ciudad">
                      </div>

                      <div class="mb-3">
                        <label for="numero" class="form-label">Contacto</label>
                        <input type="numero" class="form-control" id="numero" placeholder="Tel: / Cel:" name="numero" required>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" required placeholder="Ingresa tu contraseña" name="contra1" required>
                      </div>
                      <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Repite tu contraseña" name="contra2" required>
                      </div>
                      <button type="button" class="btn btn-secondary" onclick="togglePasswordVisibility()">Ver contraseña</button>
                      <div class="form-check mb-3">
                        <br><input type="checkbox" class="form-check-input" id="aceptarPoliticas" required>
                        <label class="form-check-label" for="aceptarPoliticas">Acepto <a href="Paginas/privacidad.php">política de privacidad</a>, <a href="Paginas/TyC.php">términos y
                            condiciones</a></label>

                      </div>
                      <button type="submit" class="btn btn-primary w-100">REGISTRO</button>
                      <label class="mt-2 text-muted">¿Necesitas más información? <a href="#">Saber más</a></label>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <br><br>
          </div>

          <!-- Fin Registro -->
        </div>
    </main>
    <footer class="container text-light py-4" style="background: #575764;">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <!-- Redes Sociales -->
          <div class="footer-item">
            <h5>Redes Sociales</h5>
            <!-- Agrega aquí tus iconos de redes sociales -->
            <img src="imagen/footer/facebook.png" alt="facebook" width="50" class="me-2">
            <img src="imagen/footer/instagram.png" alt="instagram" width="50" class="me-2">
            <img src="imagen/footer/youtube.png" alt="youtube" width="50" class="me-2">
            <img src="imagen/footer/logotipos.png" alt="X" width="50" class="me-2">
          </div>
          <!-- Contacto -->
          <div class="footer-item" style="margin-bottom: 1rem; margin-bottom: 0.5rem;">
            <h5>Contacto</h5>
            <div>
              <div>
                <p class="mb-1"> <img src="imagen/footer/e-mail.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 100px;">
                  Explora-Edu@Eploracolombia.com.co</p>
                <p class="mb-1"> <img src="imagen/footer/telefono.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 20px;">
                  565-1219</p>
                <p class="mb-1"> <img src="imagen/footer/whatsapp-7466235.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 20px;">
                  312-777- 9865</p>
                <p class="mb-1"> <img src="imagen/footer/ubicacion_l.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 30px;">
                  Aguachica - Cesar</p>
                <p class="mb-1"> &ensp; &ensp; &ensp; Dirección: Cra 40 3N 22</p>
              </div>
            </div>
          </div>
          <!-- Calificación -->
          <div class="footer-item">
            <h5>Calificación</h5>
            <img class="mb-1"> <img src="imagen/footer/5 estrella.svg" alt="Barra de contacto" class="img-fluid me-2" style="max-width: 100px;">
          </div>
        </div>
        <!-- Logo -->
        <div class="text-center mt-4">
          <img src="imagen/Logo/icono1.webp" alt="Logo" width="100px" class="img-fluid" style="border-radius: 100%;">
        </div>
      </div>
    </footer>

    <!-- Scrips -->
    <!-- Agregar script para mostrar u ocultar la contraseña -->
    <script>
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var confirmPasswordInput = document.getElementById("confirm_password");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          confirmPasswordInput.type = "text";
        } else {
          passwordInput.type = "password";
          confirmPasswordInput.type = "password";
        }
      }

      function RPassword() {
        var passwordInput = document.getElementById("exampleInputPassword1");
        var toggleImage = document.getElementById("toggleImage");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleImage.src = "imagen/ver.png";

        } else {
          passwordInput.type = "password";
          toggleImage.src = "imagen/ojo.png";

        }
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="Js/bootstrap.bundle.min.js"></script>

  </div>
</body>

</html>