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
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("confirm_password");
            var actual = document.getElementById("Actual_password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                actual.type = "text";
                confirmPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                actual.type = "password";
                confirmPasswordInput.type = "password";
            }
        }
    </script>
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
                <form action="../php/actualizarcontra.php" method="post">
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Contraseña Actual</label>
                        <input type="password" class="form-control" id="Actual_password" name="contra" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="togglePasswordVisibility()">Ver contraseña</button>
                    <button type="submit" class="btn btn-primary">Guardar contraseña</button>
                    <button type="submit" class="btn btn-primary"><a href="perfil.php" style="text-decoration: none; color:#ffffff;">Volver</a></button>
                </form>
            </div>
            <div class="col -md-3"></div>
        </div>
    </div>
    <!-- Scrips -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <script src="../control/password.js"></script>
    <!-- <script src="Js/bootstrap.min.js"></script> -->
</body>

</html>