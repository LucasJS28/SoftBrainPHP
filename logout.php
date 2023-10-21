<?php
    /* Esta seccion del codigo elimina todas las sesiones inicializadas sean de usuario o de carrito */
    session_start();
    session_destroy();
    header("Location: index.php"); /* Reenvia al Formulario de Login */
    exit;
?>