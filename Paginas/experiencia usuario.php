 <?php
    session_start();
    if (!isset($_SESSION['Email'])) {
        header("location: ../index.php");
        exit();
    } else {
        $usuario_iniciado = true;
        $user = $_SESSION['Email'];
    }
    ?>

 <!DOCTYPE html>
 <html lang="es">

 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Experiencias</title>
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

     .btn {
         float: inline-end;
         background: #78EFD9;
         font-weight: bold;
     }

     .btn:hover {
         color: #78EFD9;
         border: solid 1px #78EFD9;

     }

     #boton-guardar {
         width: 70px;
         height: 30px;

     }

     #vista-previa {
         display: grid;
         grid-template-columns: repeat(3, 1fr);

         gap: 15px;

     }

     .imagen-container {
         max-width: 100%;

         height: auto;
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

                     </div>
                 </div>
             </nav>
             <!-- Fin menú -->
         </header>
         <main>
             <div class="container" style="padding: 10px; padding-top: 0; background-color: #f8f8ff">

                 <div class="container" style="text-align: justify; padding: 80px; text-align: 1 em;">
                     <br><br>
                     <center>
                         <h2>Sube tus fotos de experiencias vividas con Explora Edu</h2>
                     </center>
                     <br />
                     <div class="container" style="border-radius: 10%; background: #eff2f3;">
                         <form action="../php/experiencias usuarios_bd.php" method="POST" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-2"></div>
                                 <div class="col-8" style="margin: auto; width: 100%;">
                                     <br><br>
                                     <div id="vista-previa"></div> <br><br>
                                     <input type="hidden" name="usuario" value="<?php echo $user ?>">
                                     <input name="archivo[]" type="file" id="archivo" onchange="mostrarVistaPrevia(this)" multiple accept="image/*">
                                     <br><br>
                                     <input type="text" name="asunto" placeholder="Asunto: (Maximo 90 caracteres incluye espacios) " maxlength="90" style="border-radius: 15px; width: 80%;"> <br> <br>
                                     <div id="contador" style="float: inline-end;">Caracteres restantes: 300</div>
                                     <textarea name="comentario" id="commentText" oninput="contarCaracteres()" placeholder="Descrición de maximo 300 caracteres" maxlength="300" cols="30" rows="10" style="height: 5em; width: 100%; resize: none;"></textarea>
                                 </div>
                                 <div class="col-2"></div>
                             </div>
                             <div class="row" id="vista-previa"></div>
                             <br><br>
                             <button class="btn" type="submit">
                                 Enviar
                             </button>
                         </form>

                         <div class="container" style="width: 60%;">
                             <p> <b>Información: </b> Las fotos que se envien son para uso exclusivo de la entidad, si son aptas seran publicadas despues de una revisión. Si cumple los requistos podras verlas en la sección de experiencias. <br>
                                 si las fotos no son de su autoria, cualquier denuncia sera remitida al remitente de la imagen para que responda ante la ley. <br></br>
                                 <i>
                                     <center>Nos abstenemos de responder correo por la aprovación o no de las imagenes</center>
                                 </i>
                             </p>
                             <br><br><br>
                         </div>
                         <div>
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
         <!-- para previsualizar las fotos -->

         <script>
             function mostrarVistaPrevia(input) {
                 var archivos = input.files;
                 var vistaPrevia = document.getElementById('vista-previa');
                 vistaPrevia.innerHTML = ''; // Limpiar contenido previo

                 for (var i = 0; i < archivos.length; i++) {
                     var archivo = archivos[i];
                     var url = URL.createObjectURL(archivo);

                     var img = document.createElement('img');
                     img.src = url;
                     img.className = 'imagen-container'; // Aplicar estilo a la imagen

                     var fila = Math.floor(i / 3); // Calcular fila
                     var columna = i % 3; // Calcular columna

                     img.style.gridRow = fila + 1; // Establecer la fila (comienza en 1)
                     img.style.gridColumn = columna + 1; // Establecer la columna (comienza en 1)

                     vistaPrevia.appendChild(img); // Agregar imagen a la cuadrícula
                 }

             }
         </script>

         <!-- fin de previzualización -->
         <!-- Contado de caracteres -->
         <script>
             function contarCaracteres() {
                 var comentario = document.querySelector('textarea[name="comentario"]').value;
                 var longitud = comentario.length;
                 var maximo = 300;
                 var restantes = maximo - longitud;
                 var contador = document.getElementById("contador");
                 contador.textContent = "Caracteres restantes: " + restantes;
             }
         </script>
         <!-- fin de contador -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="../Js/bootstrap.bundle.min.js"></script>
         <script src="../control/password.js"></script>
         <!-- <script src="Js/bootstrap.min.js"></script> -->
         <!-- Fin de los scripts -->
     </div>
 </body>

 </html>