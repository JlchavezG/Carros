<?php
// Login.php
session_start();
include 'app/conecta.php'; // Asegúrate de tener la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta en la base de datos
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($Conecta, $query);

    if (mysqli_num_rows($result) > 0) {
        // Usuario encontrado, iniciar sesión
        $_SESSION['username'] = $username;
        header('Location: Home.php'); // Redirige a la página principal o dashboard
        exit;
    } else {
        $error_message = "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Iniciar Sesión</h2>
    
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
    
    <form action="Login.php" method="POST" class="mt-4">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Mostrar</button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">Ingresar</button>
    </form>

    <!-- Enlaces para recuperación de contraseña y registro -->
    <div class="text-center mt-3">
        <a href="forgot_password.php" class="text-info">¿Olvidaste tu contraseña?</a> | 
        <a href="register.php" class="text-info">Regístrate</a>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordButton = event.currentTarget;
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordButton.textContent = 'Ocultar';
        } else {
            passwordInput.type = 'password';
            passwordButton.textContent = 'Mostrar';
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



