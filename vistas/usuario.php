<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el perfil de juego
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'usuario') {


    echo "<h2>Vista de jugador, {$_SESSION['nombre']}!</h2>";
    echo "<p><a href='index.php'>Cerrar sesión</a></p>";
} else {
    // Si el usuario no tiene permisos de juego, redirigirlo a otra página
    header('Location: index.php?accion=logout');
    exit();
}
?>
