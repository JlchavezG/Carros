<?php
session_start();
include 'Catalogo.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agencia de Matichicharron</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">¡Hola, <?php echo $_SESSION['username']; ?>!</h1>
                <p class="lead">¿Qué veremos hoy?</p>

                <!-- Tarjetas de carros con imágenes -->
                <div class="row mt-4">
                    <?php
                    foreach ($carros as $carro) {
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <img src="' . $carro['imagen'] . '" class="card-img-top" alt="Imagen de ' . $carro['nombre'] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $carro['nombre'] . '</h5>
                                    <p class="card-text">' . $carro['descripcion'] . '</p>
                                    <p class="card-text"><strong>Precio: </strong>' . $carro['precio'] . '</p>
                                    <a href="detalles.php?carro=' . urlencode($carro['nombre']) . '" class="btn btn-primary">Ver más</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>

                <div class="mt-4">
                    <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
