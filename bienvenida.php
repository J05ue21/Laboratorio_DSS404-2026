<?php
session_start();
require 'conexionBD/conexion.php';

// esta pagina se mostrara si y solo si, la variable de sesión existe, sino, se redirige al login.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();     //cierra este script al tiempo que redirige a login.php
}

$mensaje_asistencia = "";

// guardar la asistencia en la base de datos
if (isset($_POST['marcar'])) 
    {
        $id_user = $_SESSION['user_id'];
        
        $sql = "INSERT INTO asistencias (usuario_id) VALUES (:uid)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([':uid' => $id_user])) {
            $mensaje_asistencia = "¡Asistencia guardada correctamente!";
        }
    }

    // ver el historial de las marcadas
    $sql_historial = "SELECT fecha_hora FROM asistencias WHERE usuario_id = :uid ORDER BY fecha_hora DESC";
    $stmt_h = $pdo->prepare($sql_historial);
    $stmt_h->execute([':uid' => $_SESSION['user_id']]);
    $asistencias = $stmt_h->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Panel de Asistencia</title>
</head>
<body>

    <div class="container">
        <!-- aqui se imprime el nombre del usuario que ha iniciado sesion -->
        <h1>Bienvenido(a), <?php echo ($_SESSION['nombre']); ?></h1>
        
        <p>Se ha iniciado sesión correctamente</p>
        
        <form method="POST">
            <button type="submit" name="marcar" style="padding: 10px; background: green; color: white;">
                MARCAR ASISTENCIA DE HOY
            </button>
        </form>

        <?php 
            //if($mensaje_asistencia) 
            echo "<p>$mensaje_asistencia</p>";
        ?>

        <h3>Historial de asistencias:</h3>
        <ul>
            <?php 
                foreach($asistencias as $reg):
            ?>
                <li>
                    <?php 
                        echo $reg['fecha_hora']; 
                    ?>
                </li>
            <?php
                endforeach;
            ?>
        </ul>

        <hr>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>