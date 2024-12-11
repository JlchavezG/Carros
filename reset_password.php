<?php
// reset_password.php
session_start();
include 'app/conecta.php'; // Asegúrate de tener la conexión a la base de datos

// Verificar si el nombre de usuario está en la sesión
if (!isset($_SESSION['reset_username'])) {
    header('Location: forgot_password.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $username = $_SESSION['reset_username'];

    if ($new_password === $confirm_password) {
        // Actualizar la contraseña en la base de datos
        $update_query = "UPDATE usuarios SET password = '$new_password' WHERE username = '$username'";
        mysqli_query($Conecta, $update_query);

        // Eliminar el nombre de usuario de la sesión después de cambiar la contraseña
        unset($_SESSION['reset_username']);
        $success_message = "Contraseña actualizada correctamente. Ahora puedes ";
    } else {
        $error_message = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Restablecer Contraseña</h2>

    <?php if (!empty($success_message)): ?>
        <div class="alert alert-success">
            <?php echo $success_message; ?>
            <a href="Login.php" class="btn btn-link">Iniciar Sesión</a>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="reset_password.php" method="POST" class="mt-4">
        <div class="form-group">
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Cambiar Contraseña</button>
    </form>
</div>
</body>
</html>

