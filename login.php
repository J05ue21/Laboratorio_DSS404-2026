<?php
require 'conexionBD/conexion.php';
session_start(); // iniciando la sesion, permite utilizar $_SESSION

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // consulta con pdo para buscar un usuario
    $sql = "SELECT * FROM usuarios WHERE correo = :correo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':correo' => $correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // si el usuario existe y la contraseña es correcta, se  crean las variables session
    if ($usuario && password_verify($password, $usuario['password'])) 
        {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre_completo'];
        
            // cambiar a pagina de bienvenida, luego se detiene o finaliza este script con exit()
            header("Location: bienvenida.php");
            exit();
        }       
    else 
        {
            $error = "<div class='alerta alerta-error'>
                        Correo o contraseña incorrectos. Intenta de nuevo
                    </div>";
        }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
        <h2>Login - Sistema de Control de Asistencia</h2>
        <?php
            if($error) echo $error;
        ?>

        <form method="POST">
            <label>Correo Electrónico:</label><br>
            <input type="email" name="correo" placeholder="tu_correo@mail.com" required><br><br>
            
            <label>Contraseña:</label><br>
            <input type="password" name="password" required><br><br>
            
            <button type="submit" class="btn-primary">Entrar</button>
        </form>
        <p style="margin-top: 20px; font-size: 0.9rem;">
            ¿No tienes cuenta? <br>
        <a href="registro.php" class="btn-secundario">Regístrate aquí</a>
    </p>
    </div>
</body>
</html>