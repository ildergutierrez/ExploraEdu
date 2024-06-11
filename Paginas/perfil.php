<!-- <?php
      session_start();
      if (!isset($_SESSION['Email'])) {
        header("location: ../index.php");
        exit();
      } else {
        $usuario_iniciado = true;
      }
      ?> -->


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Configuracion</title>
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

  .navbar-nav .nav-item .nav-link:hover {
    background: #0dcaf0;
    border-radius: 15px;
    color: #000000;
  }
</style>

<body style="background: rgb(61, 83, 82)">
  <div class="container-fluid" style="padding: 0">
    <!-- verifica si inicio o no sesión-->
    <?php

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
          </div>
        </div>
      </nav>
      <!-- Fin menú -->
    </header>
    <main>
      <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f8ff">
        <!-- Ventana modal Imagen-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><img src="../imagen/Logo/Icono.svg" alt="" width="80px">Subir Imagen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Contenido del formulario de inicio de sesión -->
                <form action="../php/Cargar_imagen.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="imagen" class="form-label">Seleccionar imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Subir Imagen</button>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- fin ventan Modal -->
        <!-- Ventana modal Actualizar Datos -->
        <div class="modal fade" id="modalContrasena" tabindex="-1" aria-labelledby="modalContrasenaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><img src="../imagen/Logo/Icono.svg" alt="" width="80px">Confirmar contraseña</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="inputContrasena" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="inputContrasena" placeholder="Ingresa tu contraseña" required name="pass">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmarContrasena">Confirmar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin ventan Modal Actualizar Datos -->

        <div class="container" style="text-align: justify; padding: 80px; text-align: 1 em;">
          <br><br><br>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <!-- Imagen perfil -->
              <center>
                <?php

                include('../php/Buscar_imagen.php');

                $ruta_imagen_predeterminada = "../imagen/4.png";

                if (isset($nombre_imagen) && !empty($nombre_imagen)) {

                  $ruta_imagen_perfil = "../img_User/" . $nombre_imagen;

                  if (file_exists($ruta_imagen_perfil)) {

                    echo '<img src="' . $ruta_imagen_perfil . '" alt="Perfil" style="max-width: 500px; max-height: 350px; border-radius: 50%; border: solid 1px #000000;">';
                  } else {

                    echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil"  style=" max-width: 500px; max-height: 350px;  border-radius: 50%; border: solid 1px #000000;">';
                  }
                } else {

                  echo '<img src="' . $ruta_imagen_predeterminada . '" alt="Perfil"   style=" max-width: 500px; max-height: 350px; border-radius: 50%; border: solid 1px #000000;">';
                }
                ?>
              </center>
            </div>
            <div class="col-md-2">

            </div>
          </div><br>
          <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              <center><button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Subir Imagen
                </button></center>
            </div>

            <div class="col-md-2">

            </div>
          </div><br><br>
          <?php

          include('../php/Conexion_bd.php');

          $E_mail = $_SESSION['Email'];

          $query = "SELECT * FROM user WHERE Email='$E_mail'";
          $resultado = mysqli_query($conexion, $query);

          if ($resultado && mysqli_num_rows($resultado) > 0) {

            $datos_usuario = mysqli_fetch_assoc($resultado);

            $nombre_completo = $datos_usuario['Full_Name'];
            $email = $datos_usuario['Email'];
            $departamento = $datos_usuario['Departamento'];
            $ciudad = $datos_usuario['Ciudad'];
            $llamar = $datos_usuario['Contacto'];

            mysqli_close($conexion);
          }
          ?>

          <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">

              <form id="formularioActualizar" action="../php/Buscar_perfil.php" method="post">
                <div class="mb-3">
                  <label for="nombreCompleto" class="form-label">Nombre completo</label>
                  <input type="text" class="form-control" id="nombreCompleto" placeholder="Ingresa tu nombre completo" name="Nombre_completo" value="<?php echo $nombre_completo; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Ingresa tu email" name="correo" value="<?php echo $email; ?>" title="No se puede modificar este cammpo">

                </div>
                <div class="mb-3">
                  <label for="departamentos" class="form-label">Departamento de Colombia</label>
                  <select id="departamentos" name="departamento" class="form-select w-100" required>
                    <option value="">Selecciona un departamento</option>
                    <option value="Amazonas" <?php if ($departamento === "Amazonas") echo "selected"; ?>>Amazonas</option>
                    <option value="Antioquia" <?php if ($departamento === "Antioquia") echo "selected"; ?>>Antioquia</option>
                    <option value="Arauca" <?php if ($departamento === "Arauca") echo "selected"; ?>>Arauca</option>
                    <option value="Atlántico" <?php if ($departamento === "Atlántico") echo "selected"; ?>>Atlántico</option>
                    <option value="Bolívar" <?php if ($departamento === "Bolívar") echo "selected"; ?>>Bolívar</option>
                    <option value="Boyacá" <?php if ($departamento === "Boyacá") echo "selected"; ?>>Boyacá</option>
                    <option value="Caldas" <?php if ($departamento === "Caldas") echo "selected"; ?>>Caldas</option>
                    <option value="Caquetá" <?php if ($departamento === "Caquetá") echo "selected"; ?>>Caquetá</option>
                    <option value="Casanare" <?php if ($departamento === "Casanare") echo "selected"; ?>>Casanare</option>
                    <option value="Cauca" <?php if ($departamento === "Cauca") echo "selected"; ?>>Cauca</option>
                    <option value="Cesar" <?php if ($departamento === "Cesar") echo "selected"; ?>>Cesar</option>
                    <option value="Chocó" <?php if ($departamento === "Chocó") echo "selected"; ?>>Chocó</option>
                    <option value="Córdoba" <?php if ($departamento === "Córdoba") echo "selected"; ?>>Córdoba</option>
                    <option value="Cundinamarca" <?php if ($departamento === "Cundinamarca") echo "selected"; ?>>Cundinamarca</option>
                    <option value="Guainía" <?php if ($departamento === "Guainía") echo "selected"; ?>>Guainía</option>
                    <option value="Guaviare" <?php if ($departamento === "Guaviare") echo "selected"; ?>>Guaviare</option>
                    <option value="Huila" <?php if ($departamento === "Huila") echo "selected"; ?>>Huila</option>
                    <option value="La Guajira" <?php if ($departamento === "La Guajira") echo "selected"; ?>>La Guajira</option>
                    <option value="Magdalena" <?php if ($departamento === "Magdalena") echo "selected"; ?>>Magdalena</option>
                    <option value="Meta" <?php if ($departamento === "Meta") echo "selected"; ?>>Meta</option>
                    <option value="Nariño" <?php if ($departamento === "Nariño") echo "selected"; ?>>Nariño</option>
                    <option value="Norte de Santander" <?php if ($departamento === "Norte de Santander") echo "selected"; ?>>Norte de Santander</option>
                    <option value="Putumayo" <?php if ($departamento === "Putumayo") echo "selected"; ?>>Putumayo</option>
                    <option value="Quindío" <?php if ($departamento === "Quindío") echo "selected"; ?>>Quindío</option>
                    <option value="Risaralda" <?php if ($departamento === "Risaralda") echo "selected"; ?>>Risaralda</option>
                    <option value="San Andrés y Providencia" <?php if ($departamento === "San Andrés y Providencia") echo "selected"; ?>>San Andrés y Providencia</option>
                    <option value="Santander" <?php if ($departamento === "Santander") echo "selected"; ?>>Santander</option>
                    <option value="Sucre" <?php if ($departamento === "Sucre") echo "selected"; ?>>Sucre</option>
                    <option value="Tolima" <?php if ($departamento === "Tolima") echo "selected"; ?>>Tolima</option>
                    <option value="Valle del Cauca" <?php if ($departamento === "Valle del Cauca") echo "selected"; ?>>Valle del Cauca</option>
                    <option value="Vaupés" <?php if ($departamento === "Vaupés") echo "selected"; ?>>Vaupés</option>
                    <option value="Vichada" <?php if ($departamento === "Vichada") echo "selected"; ?>>Vichada</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="ciudad" class="form-label">Ciudad / Municipio</label>
                  <input type="ciudad" class="form-control" id="ciudad" placeholder="Ciudad / Municipio" name="ciudad" value="<?php echo $ciudad; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="numero" class="form-label">Contacto</label>
                  <input type="numero" class="form-control" id="numero" placeholder="Tel: / Cel:" name="numero" value="<?php echo $llamar; ?>" required>
                </div>
                <!-- Botón para actualizar los datos -->
                <center>
                  <button type="button" class="btn btn-outline-info" id="btnAbrirModalContrasena">
                    Actualizar Datos
                  </button>
                </center>
              </form>
              <br><br>
              <center> <label><a href="TyC.php">términos y condiciones</a></label> <br><br>
                <label><a href="privacidad.php">política de privacidad</a></label><br><br>
                <label><a href="nueva.php">Cambiar contraseña</a></label>
              </center>
            </div>
            <div class="col-md-5"></div>
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
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const modalContrasena = new bootstrap.Modal(document.getElementById('modalContrasena'));
        const btnAbrirModalContrasena = document.getElementById('btnAbrirModalContrasena');
        const btnConfirmarContrasena = document.getElementById('btnConfirmarContrasena');
        const inputContrasena = document.getElementById('inputContrasena');
        const formularioActualizar = document.getElementById('formularioActualizar');

        // Cuando se haga clic en el botón "Actualizar Datos", abre el modal de contraseña
        btnAbrirModalContrasena.addEventListener('click', function() {
          modalContrasena.show();
        });

        // Cuando se haga clic en el botón "Confirmar" dentro del modal de contraseña
        btnConfirmarContrasena.addEventListener('click', function() {
          // Obtiene la contraseña ingresada por el usuario
          const contrasenaIngresada = inputContrasena.value;

          // Realiza una solicitud AJAX para enviar la contraseña al archivo PHP
          const xhr = new XMLHttpRequest();
          xhr.open('POST', '../php/validar.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onload = function() {
            if (xhr.status === 200) {
              // Si la solicitud fue exitosa, maneja la respuesta del servidor
              const respuesta = xhr.responseText;
              if (respuesta === 'correcta') {
                // Si la contraseña es correcta, envía el formulario de actualización
                formularioActualizar.submit();
              } else {
                // Si la contraseña es incorrecta, muestra un mensaje de error
                alert('Contraseña incorrecta. Por favor, intenta de nuevo.');
              }
            }
          };
          xhr.send('contrasena=' + encodeURIComponent(contrasenaIngresada));
        });
      });
    </script>

    <!-- Scrips -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <!-- <script src="Js/bootstrap.min.js"></script> -->
  </div>
</body>

</html>