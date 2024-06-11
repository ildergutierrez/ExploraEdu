<?php
session_start();
$email = $_GET['id'];
if (empty($email)) {
    echo "<script>
    alert('Acceso denegado');
    location.href ='inicio.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña</title>
    <!-- Agregar enlaces a Bootstrap CSS y JavaScript -->
    <link rel="icon" href="../imagen/Logo/Icono.svg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Agregar script para mostrar u ocultar la contraseña -->

</head>

<body>

    <div class="container">
        <br><br><br><br>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <center>
                    <h1><img src="../imagen/Logo/Icono.svg" alt="" width="80px">Nueva contraseña</h1>
                </center>
                <form action="../php/recuperar_usuario.php" method="post">
                    <input type="hidden" value="<?php echo $email ?>" name="email">
                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
                    </div>
                    <button type="button" id="palabra" class="btn btn-secondary" onclick="togglePasswordVisibility()">Ver contraseña</button>
                    <button type="submit" class="btn btn-primary">Guardar contraseña</button>
                    <button type="submit" class="btn btn-primary"><a href="../index.php" style="text-decoration: none; color:#ffffff;">Volver</a></button>
                </form>
            </div>
            <div class="col -md-3"></div>
        </div>
    </div>
    <!-- Scrips -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("confirm_password");
            var palabra = document.getElementById("palabra");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                palabra.textContent = "Ocultar Contraseña";
                confirmPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                confirmPasswordInput.type = "password";
                palabra.textContent = "Ver Contraseña";
            }
        }
    </script>
</body>

</html>