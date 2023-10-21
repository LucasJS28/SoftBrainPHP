<?php
session_start(); // Iniciar la sesión
include 'nav.php';
require_once 'Conexion.php';
if (isset($_SESSION["correoUsuario"])) {
    header("Location:index.php");
    exit();
}
if (isset($_POST['login'])) {
    $correoUsuario = $_POST['correoUsuario'];
    $passUsuario = $_POST['passUsuario'];

    $conexion = new Conexion();

    if ($conexion->login($correoUsuario, $passUsuario)) {
        // Inicio de sesión exitoso
        $_SESSION['correoUsuario'] = $correoUsuario;
        echo "<script>alert('Credenciales Correctas');</script>";
        echo "<script>window.location = 'cotizar.php';</script>";
    }
     else {
        // Credenciales incorrectas
        echo "<script>alert('Credenciales Incorrectas');</script>";
    }
}

if (isset($_POST['register'])) {
    $correoUsuario = $_POST['registro_correoUsuario'];
    $passUsuario = $_POST['registro_passUsuario'];
    $confirmarPassUsuario = $_POST['registro_confirmar_passUsuario'];

    if ($passUsuario === $confirmarPassUsuario) {
        $conexion = new Conexion();
        $idUsuario = $conexion->register($correoUsuario, $passUsuario);

        if ($idUsuario) {
            // Registro exitoso
            echo "<script>alert('Registro exitoso. ID de usuario: " . $idUsuario . "');</script>";
        } else {
            // Error en el registro
            echo "<script>alert('Error en el registro');</script>";
        }
    } else {
        // Las contraseñas no coinciden
        echo "<script>alert('Las contraseñas no coinciden');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Iniciar Sesion</div>
                <div class="title signup">Registro</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Inicio</label>
                    <label for="signup" class="slide signup">Registro</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form id="loginForm" action="login.php" method="post" class="login" onsubmit="submitForm(event, 'login')">
                        <div class="field">
                            <input type="text" placeholder="Correo Electronico" name="correoUsuario" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Contraseña" name="passUsuario" required>
                        </div>
                        <div class="pass-link"><a href="#">Olvidaste tu Contraseña?</a></div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="login" value="Login">
                        </div>
                        <div class="signup-link">No estas Registrado? <a href="#">Registrate Ahora</a></div>
                    </form>
                    <form id="signupForm" action="login.php" method="post" class="signup" onsubmit="submitForm(event, 'register')">

                        <div class="field">
                            <input type="text" placeholder="Correo Electronico" name="registro_correoUsuario" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Contraseña" name="registro_passUsuario" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Repetir Contraseña" name="registro_confirmar_passUsuario" required>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="register" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const signupForm = document.querySelector("form.signup");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        let userAuthenticated = false;
        const cotizacionLink = document.querySelector(".cotizacion-link");
        let users = [];

        signupBtn.onclick = () => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        };

        loginBtn.onclick = () => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        };

        signupLink.onclick = () => {
            signupBtn.click();
            return false;
        };

    </script>
    
</body>
</html>
