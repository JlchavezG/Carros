<?php
// Incluir el catálogo para obtener los detalles de los carros
include 'Catalogo.php';

// Obtener el nombre del carro desde la URL
$carroNombre = isset($_GET['carro']) ? $_GET['carro'] : '';

// Buscar los detalles del carro seleccionado
$carroSeleccionado = null;
foreach ($carros as $carro) {
    if ($carro['nombre'] === $carroNombre) {
        $carroSeleccionado = $carro;
        break;
    }
}

// Verificar si se encontró el carro
if (!$carroSeleccionado) {
    echo "Carro no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de <?php echo $carroSeleccionado['nombre']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $carroSeleccionado['nombre']; ?></h1>
                <img src="<?php echo $carroSeleccionado['imagen']; ?>" alt="Imagen de <?php echo $carroSeleccionado['nombre']; ?>" class="img-fluid mb-4">
                <p><strong>Descripción:</strong> <?php echo $carroSeleccionado['descripcion']; ?></p>
                <p><strong>Precio:</strong> <?php echo $carroSeleccionado['precio']; ?></p>
                
                <!-- Características detalladas del carro -->
                <?php if ($carroSeleccionado['nombre'] == 'Lamborghini Huracán EVO') { ?>
                    <h5>Características del Lamborghini Huracán EVO:</h5>
                    <ul>
                        <li>Motor: V10 de 5,2 L</li>
                        <li>Potencia: 631 hp</li>
                        <li>Peso: 1,422 kg</li>
                        <li>Sistema de frenos: Carbono-cerámicos</li>
                        <li>Sistema de control de tracción</li>
                    </ul>
                <?php } elseif ($carroSeleccionado['nombre'] == 'Ferrari 488 Pista') { ?>
                    <h5>Características del Ferrari 488 Pista:</h5>
                    <ul>
                        <li>Motor: V8 biturbo de 3,9 L</li>
                        <li>Potencia: 711 hp</li>
                        <li>Peso: 1,385 kg</li>
                        <li>Sistema de frenos: Carbono-cerámicos</li>
                        <li>Sistema de control: Aerodinámica activa</li>
                    </ul>
                <?php } elseif ($carroSeleccionado['nombre'] == 'Porsche 911 Turbo S') { ?>
                    <h5>Características del Porsche 911 Turbo S:</h5>
                    <ul>
                        <li>Motor: Bóxer 6 cilindros de 3,7 L</li>
                        <li>Potencia: 640 hp</li>
                        <li>Peso: 1,640 kg</li>
                        <li>Sistema de frenos: Porsche Ceramic Composite Brakes (PCCB)</li>
                        <li>Sistema de control: Tracción integral inteligente</li>
                    </ul>
                    <?php } elseif ($carroSeleccionado['nombre'] == 'Bugatti Chiron') { ?>
                    <h5>Características del Bugatti Chiron:</h5>
                    <ul>
                        <li>Motor: W16 de 8,0 L</li>
                        <li>Potencia: 1.500 CV</li>
                        <li>Peso: 1,995 kg</li>
                        <li>Sistema de frenos: Carbono-cerámicos</li>
                        <li>Sistema de control: Suspensión activa avanzada</li>
                    </ul>
                    <?php } elseif ($carroSeleccionado['nombre'] == 'McLaren 765LT') { ?>
                    <h5>Características del McLaren 765LT:</h5>
                    <ul>
                        <li>Motor: V8 biturbo de 4.0 L</li>
                        <li>Potencia: 755 hp</li>
                        <li>Peso: 1,229 kg</li>
                        <li>Sistema de frenos: Carbono-cerámicos de alto rendimiento</li>
                        <li>Sistema de control: Control de tracción avanzada</li>
                    </ul>
                    <?php } elseif ($carroSeleccionado['nombre'] == 'Ford Mustang Shelby GT500') { ?>
                    <h5>Características del Ford Mustang Shelby GT500:</h5>
                    <ul>
                        <li>Motor: V8 sobrealimentado de 5,2 L</li>
                        <li>Potencia: 760 hp</li>
                        <li>Peso: 1,916 kg</li>
                        <li>Sistema de frenos: Brembo de 6 pistones</li>
                        <li>Sistema de control: Modos de manejo personalizados</li>
                    </ul>
                <?php } ?>

                <a href="Home.php" class="btn btn-primary mt-4">Volver al catálogo</a>
            </div>
        </div>
    </div>
</body>
</html>
