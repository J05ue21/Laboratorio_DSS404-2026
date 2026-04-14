<?php
// se incluye la conexion 
require 'conexionBD/conexion.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if (!empty($nombre) && !empty($correo) && !empty($password)) {
        
    // con password_hash para cifrar la contraseña
        $password_cifrada = password_hash($password, PASSWORD_DEFAULT);

        try {
            // creando consulta sql implementada con PDO
            $sql = "INSERT INTO usuarios (nombre_completo, correo, password) VALUES (:nombre, :correo, :pass)";
            $stmt = $pdo->prepare($sql);    //asignamos la consulta ya con PDO  
            
            // ejecutando la sentencia preparada contra inyeccion SQL
            $resultado = $stmt->execute([
                ':nombre' => $nombre,
                ':correo' => $correo,
                ':pass'   => $password_cifrada
            ]);

            if ($resultado)
                {
                    $mensaje = "<div class='alerta alerta-exito'>
                                    ¡Usuario registrado con éxito! <br><br>
                                    <a href='login.php' class='btn-secundario'>Ir al Login</a>
                                </div>";
                }
        } 
        catch (PDOException $e) //se captura en $e los detalles de la excepcion si hubo algun problema con la conexion
        {
            $mensaje = "<div class='alerta alerta-error'>
                            El correo ya está registrado o hubo un problema al intentar conexion
                        </div>";
        }
    }
    else
    {
        $mensaje = "<div class='alerta alerta-error'>
                        Error: Intenta de nuevo
                    </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro de Usuario</title>
</head>

<body>
    <div class="container">
        <h2>Registro de Estudiante - Control de Asistencia</h2>
        <?php echo $mensaje; ?>
        
        <form method="POST" action="registro.php">
            <label>Nombre Completo:</label><br>
            <input type="text" name="nombre" required><br><br>
            
            <label>Correo Electrónico:</label><br>
            <input type="email" name="correo" placeholder="tu_correo@mail.com" required><br><br>
            
            <label>Contraseña:</label><br>
            <input type="password" name="password" required><br><br>
            
            <button type="submit" class="btn-primary">Registrarme</button>
        </form>

        <p style="margin-top: 20px; font-size: 0.9rem;">
            ¿Ya tienes cuenta? <br>
        <a href="login.php" class="btn-secundario">Ingresa aquí</a>

    </div>
</body>
</html>