<?php
require_once 'Conexion.php';
$usuario = isset($_SESSION['correoUsuario']) ? $_SESSION['correoUsuario'] : null;
?>

<nav>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <a href="index.php"><i class="fas fa-home"></i>  Inicio</a>
    <a href="servicios.php"><i class="fas fa-server"></i> Nuestros Servicios</a>
    <a href="sobreNosotros.php"><i class="fas fa-clipboard-list"></i> Sobre Nosotros</a>
    <a href="clientes.php"><i class="fas fa-user-friends"></i> Nuestros Clientes</a>
    <a href="terminos.php"><i class="fas fa-file-signature"></i> Terminos y Condiciones</a>
    <?php
    if (!empty($usuario)) {
        // Si $usuario no está vacío (es decir, tiene un correo), muestra el enlace de Cotización.
        echo '<a href="cotizar.php" class="cotizacion-link"><i class="fas fa-cash-register"></i> Cotización</a>';
        
        // Agrega un enlace para cerrar sesión.
        echo '<a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>';
    } else {
        // Si no hay un usuario, muestra el enlace de inicio de sesión.
        echo '<a href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>';
    }
    ?>
    
    <a class="img_logo" href="index.html"><img class="img_logo" src="imagenes/logo.png" alt="Logo Empresarial"></a>
</nav>
