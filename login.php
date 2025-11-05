<?php
session_start();
include("conexion.php"); // Usa la conexión $conexion

// Si ya hay sesión, redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

// Procesar formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Consulta segura
    $query = "SELECT * FROM usuarios WHERE nombre_usuario=$1 AND activo=TRUE";
    $result = pg_query_params($conexion, $query, array($usuario));

    if ($fila = pg_fetch_assoc($result)) {
        // ⚠️ Para producción usa password_hash() y password_verify()
        if ($fila['contrasena'] === $contrasena) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no existe o está inactivo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Patas Felices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">🐾 Login - Patas Felices</h3>

                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>