<?php
// forgot_password.php
session_start();
include 'app/conecta.php'; // Asegúrate de tener la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    // Verificar si el nombre de usuario existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($Conecta, $query);

    if (mysqli_num_rows($result) > 0) {
        // Si el usuario existe, almacenar el nombre en la sesión y redirigir a reset_password.php
        $_SESSION['reset_username'] = $username;
        header('Location: reset_password.php');
        exit;
    } else {
        $error_message = "Este nombre de usuario no está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Recuperar Contraseña</h2>
    
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
    
    <form action="forgot_password.php" method="POST" class="mt-4">
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Continuar</button>
    </form>
</div>
</body>
</html>
