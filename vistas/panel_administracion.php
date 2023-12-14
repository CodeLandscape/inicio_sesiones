<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['perfil'])) {
    // Verificar si el perfil es de administrador
    if ($_SESSION['perfil'] == 'admin') {
        echo "<h2>Vista de Administración, {$_SESSION['nombre']}!</h2>";
        echo "<p><a href='index.php?controlador=controlador_login&accion=inicio'>Cerrar sesión</a></p>";

        // Botón para redirigir al formulario de registro de Admin de Juegos
        echo "<a href='index.php?controlador=controlador_registro&accion=registroAdminJuego'>Añadir Admin de Juegos</a>";
    } else {
        // Mostrar este mensaje si el perfil no es de administrador
        echo "<h1>Largo de aquí</h1>";
    }
} else {
    // Mostrar este mensaje si no hay una sesión activa
    echo "<h1>Largo de aquí</h1>";
}
