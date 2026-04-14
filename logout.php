<?php
    session_start();
    session_destroy(); // se destruye la sesion actual
    header("Location: login.php");  //luego se reenvia para iniciar nueva sesion
    exit();
?>