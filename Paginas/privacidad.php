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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mision</title>
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
                                        <input type="hidden" value="../Paginas/inicio.php" name="link">
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

                    <br>
                    <center>
                        <h1>Política de Privacidad</h1>
                    </center>
                    <br><br>
                    En <strong>Explora Edu</strong>, valoramos y respetamos tu privacidad. Esta política de privacidad
                    describe cómo recopilamos, utilizamos y protegemos la información personal que nos proporcionas al
                    utilizar nuestra plataforma.
                    <br><br>
                    1. Información recopilada:
                    <ul>
                        <li>Información de registro: Al registrarte en <strong>Explora Edu</strong>, recopilamos
                            información personal como tu nombre, dirección de correo electrónico, institución educativa
                            y cualquier otra información relevante que nos proporciones voluntariamente.</li>
                        <li>Información de uso: Recopilamos información sobre tu actividad en la plataforma, como las
                            páginas que visitas, las acciones que realizas y la duración de tu sesión.</li>
                        <li>Cookies y tecnologías similares: Utilizamos cookies y otras tecnologías de seguimiento para
                            mejorar tu experiencia en la plataforma y proporcionarte contenido personalizado. Puedes
                            gestionar tus preferencias de cookies a través de la configuración de tu navegador.</li>
                    </ul>
                    <br>
                    2. Uso de la información:
                    <ul>
                        <li>Utilizamos la información recopilada para proporcionarte acceso a nuestra plataforma,
                            gestionar tu cuenta, procesar tus transacciones y ofrecerte servicios personalizados.</li>
                        <li>También podemos utilizar tu información para comunicarnos contigo, enviar notificaciones
                            importantes relacionadas con tu cuenta y proporcionarte actualizaciones sobre nuestros
                            servicios y promociones.</li>
                    </ul>
                    <br>
                    3. Compartir información:
                    <ul>
                        <li>No vendemos, alquilamos ni compartimos tu información personal con terceros con fines
                            comerciales sin tu consentimiento expreso, excepto según lo requiera la ley.</li>
                        <li>Podemos compartir tu información personal con proveedores de servicios de confianza que nos
                            ayuden a operar la plataforma y brindar servicios en nuestro nombre, sujetos a obligaciones
                            de confidencialidad.</li>
                    </ul>
                    <br>
                    4. Seguridad de la información:
                    <ul>
                        <li>Nos comprometemos a proteger la seguridad de tu información personal y utilizamos medidas
                            técnicas y organizativas apropiadas para garantizar su seguridad.</li>
                        <li>Sin embargo, debes tener en cuenta que ninguna transmisión de datos a través de Internet o
                            almacenamiento electrónico es completamente segura, y no podemos garantizar la seguridad
                            absoluta de tus datos.</li>
                    </ul>
                    <br>
                    5. Cambios en la política de privacidad:
                    <br>
                    <ul>
                        <li>Nos reservamos el derecho de modificar esta política de privacidad en cualquier momento y
                            sin previo aviso. Se te notificarán los cambios significativos a través de la plataforma o
                            por otros medios adecuados.</li>
                        <li>Se te solicitará que aceptes los cambios en la política de privacidad antes de continuar
                            utilizando nuestros servicios si los cambios afectan de manera significativa a tu
                            privacidad.</li>
                    </ul>
                    <br>
                    <i>Al utilizar nuestra plataforma, aceptas los términos de esta política de privacidad. Si tienes
                        alguna pregunta o inquietud sobre nuestra política de privacidad o sobre cómo manejamos tu
                        información personal, no dudes en ponerte en contacto con nosotros a través de los medios
                        proporcionados en la plataforma.</i>
                    <br><br>

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