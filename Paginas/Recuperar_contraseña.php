<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="icon" href="../imagen/Logo/Icono.svg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="modal-title" id="exampleModalLabel"><img src="../imagen/Logo/Icono.svg" alt="" width="80px">Recuperar contraseña</h5>
                        <form action="../php/recuperacion_bd.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Direccion de correo Electronico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scrips -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <!-- <script src="Js/bootstrap.min.js"></script> -->
</body>

</html>