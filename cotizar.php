<?php
session_start(); // Iniciar la sesión
include 'nav.php';
require_once 'Conexion.php';
$conexion = new Conexion();
if (!isset($_SESSION["correoUsuario"])) {
    header("Location:index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instancia la clase Conexion para establecer la conexión a la base de datos
    // Obtener los datos del formulario
    $nombreContacto = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $descripcion = $_POST['descripcion'];
    $tipoproyecto = $_POST['tipo-proyecto'];
    $presupuesto = $_POST['presupuesto'] ?? null; // Presupuesto es opcional
    $sitiowebempresa = $_POST['sitio'] ?? null; // Sitio web de la empresa es opcional
    $cotizacionId = $conexion->ingresarcotizacion($nombreContacto, $empresa, $pais, $telefono, $correo, $descripcion, $tipoproyecto, $presupuesto, $sitiowebempresa);
    if ($cotizacionId) {
        // La cotización se insertó correctamente
        echo "<script>alert('Cotizacion Enviada, Te Hablaremos lo mas Pronto Posible');</script>";
    } else {
        // Hubo un error en la inserción
        echo "<script>alert('Revise el Formulario');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">
</head>
<style>
    .container {
        background-color: #fff;
        padding: 20px;
        padding-right: 50px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .titulo {
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
    }

    label {
        font-weight: 500;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f5f5f5;
    }

    textarea {
        height: 100px;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button:hover {
        background-color: #444;
    }

    input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #333;
        border-radius: 50%;
        margin-right: 5px;
        position: relative;
    }

    /* Estilos para los radio buttons seleccionados */
    input[type="radio"]:checked {
        background-color: #333;
        border: 2px solid #333;
    }

    /* Estilos para las etiquetas de los radio buttons */
    label input[type="radio"] {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top: 4px;
    }

    /* Estilos adicionales para las etiquetas de los radio buttons */
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        padding-top: 10px;
        font-size: 16px;
        /* Ajusta el tamaño de fuente según tus preferencias */
    }

    /* Estilos para el contenedor de radio buttons */
    .radio-container {
        margin-top: 10px;
    }

    .error-message {
        color: red;
        font-size: 13px;
        margin-top: 5px;
        padding-top: 2px;
    }

    .error-border {
        border: 1px solid red !important;
    }

    #pais {
        width: 102%; /* Esta regla se aplica por defecto */
        font-size: 14px;
    }

    #pais option{
        font-size: 15px;
    }

    @media (max-width: 768px) {
        .titulo {
            font-size: 14px;
        }

        #pais {
            width: 106%; /* Esta regla se aplica en pantallas <= 768px */
        }
    }
    #fecha-envio{
        background-color: #e4e2e2 ;   
    }

    #mostrar-campos-enlace{
        color: #333;
        font-weight: 700;
    }

    #fecha-envio{
        font-size: 15px;
        color: black;
        font-weight: 600;
    }
    #limpiar{
        float: right;
        background-color: rgb(201, 33, 33);
        border: 1px solid black;
        font-size: 15px;
    }

</style>

<body>

    <div class="container">
        <div class="titulo">
            <h1>Cotizacion</h1>
        </div>
        <form id="contact-form" action="cotizar.php" method="post">
            <label for="fecha-envio">Fecha de la Solicitud</label>
            <input type="text" id="fecha-envio" name="fecha-envio" disabled class="fecha-no-limpiar"><br>

            <span class="error-message" id="fecha-envio-error"></span>

            <label for="nombre">Nombre de Contacto:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Introduce tu nombre"><br>
            <span class="error-message" id="nombre-error"></span>

            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" required placeholder="Nombre de la empresa"><br>
            <span class="error-message" id="empresa-error"></span>

            <label for="pais">País:</label>
            <select id="pais" name="pais">
                <option value="Selecciona un país" disabled selected>Selecciona un país</option>
                <option value="Argentina">Argentina</option>
                <option value="Brasil">Brasil</option>
                <option value="México">México</option>
                <option value="Chile">Chile</option>
                <option value="Perú">Perú</option>
                <!-- Agrega más países aquí -->
            </select><br><br>
            <span class="error-message" id="pais-error"></span>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" maxlength="12" required placeholder="Número de teléfono"
                oninput="this.value = this.value.replace(/[^0-9+\s]/g, '');"><br>
            <span class="error-message" id="telefono-error"></span>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required placeholder="Tu dirección de correo electrónico"><br>
            <span class="error-message" id="correo-error"></span>
            <label>Descripción de Proyecto:</label><br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50"
                placeholder="Describe tu proyecto aquí"></textarea><br>
            <span class="error-message" id="descripcion-error"></span>
            <br><br>

            <a href="#" id="mostrar-campos-enlace">Mostrar Campos Opcionales</a>

            <div id="campos-opcionales" style="display: none;">
                <!-- Aquí coloca los campos opcionales que deseas mostrar -->
                <br>
                <label for="presupuesto">Presupuesto Estimado:</label>
                <input type="text" id="presupuesto" name="presupuesto" placeholder="Ingrese su Presupuesto Estimado (Opcional)"
                    oninput="this.value = this.value.replace(/[^0-9+\s]/g, '');"><br>
            
                <label for="sitio">Sitio Web de la Empresa:</label>
                <input type="text" id="sitio" name="sitio" placeholder="Sitio Web de la Empresa (Opcional)"><br>
            </div>
            <br><br>
            <label>Tipo de Proyecto:</label><br>
            <label><input checked type="radio" name="tipo-proyecto" value="Pagina Web"> Página Web</label><br>
            <label><input type="radio" name="tipo-proyecto" value="Marketing"> Marketing</label><br>
            <label><input type="radio" name="tipo-proyecto" value="Servicio Tecnico"> Servicio Técnico</label><br>
            <label><input type="radio" name="tipo-proyecto" value="Otro"> Otro</label><br><br>
            <span class="error-message" id="tipo-proyecto-error"></span>

            <button type="submit" id="enviar">Enviar</button>
            <button type="button" id="limpiar">🗑️</button>

        </form>

    </div>


    <script>

const limpiarButton = document.getElementById('limpiar');
    
    limpiarButton.addEventListener('click', function () {
        // Guardar el valor de fecha de solicitud antes de limpiar
        const fechaEnvioInput = document.querySelector('.fecha-no-limpiar');
        const fechaEnvioValue = fechaEnvioInput.value;

        // Restablecer el formulario a su estado inicial
        document.getElementById('contact-form').reset();

        // Restaurar el valor de fecha de solicitud
        fechaEnvioInput.value = fechaEnvioValue;

        // Reiniciar los estilos y mensajes de error
        reiniciarEstilos();
    });
      // Agrega el siguiente script para mostrar u ocultar los campos opcionales al hacer clic en el enlace
    const mostrarCamposEnlace = document.getElementById('mostrar-campos-enlace');
    const camposOpcionales = document.getElementById('campos-opcionales');

    mostrarCamposEnlace.addEventListener('click', function (e) {
        e.preventDefault(); // Evita que el enlace cambie la URL
        if (camposOpcionales.style.display === 'none') {
            camposOpcionales.style.display = 'block';
            mostrarCamposEnlace.textContent = 'Ocultar Campos Opcionales';
        } else {
            camposOpcionales.style.display = 'none';
            mostrarCamposEnlace.textContent = 'Mostrar Campos Opcionales';
        }
    });
        function obtenerFechaYHoraActual() {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Enero es 0
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        }

        // Establecer la fecha y hora actual en el campo de fecha de envío
        document.getElementById('fecha-envio').value = obtenerFechaYHoraActual();
        const codigosPaises = {
            "Argentina": "+54 ",
            "Brasil": "+55 ",
            "México": "+52 ",
            "Chile": "+56 ",
            "Perú": "+51 ",

        };


        const paisSelect = document.getElementById('pais');
        const telefonoInput = document.getElementById('telefono');
        const enviarButton = document.getElementById('enviar');
        const nombreInput = document.getElementById('nombre');
        const correoInput = document.getElementById('correo');
        const descripcionInput = document.getElementById('descripcion');
        const empresaInput = document.getElementById('empresa');

        paisSelect.addEventListener('change', function () {
            const selectedPais = paisSelect.value;
            if (codigosPaises[selectedPais]) {
                telefonoInput.value = codigosPaises[selectedPais];
            }
        });


        enviarButton.addEventListener('click', function () {
            if (validarFormulario()) {
            }
        });

        telefonoInput.addEventListener('input', function () {
            const telefonoValue = telefonoInput.value;
            if (telefonoValue.length < 4) {
                telefonoInput.value = codigosPaises[paisSelect.value] || '';
            }
        });


        enviarButton.addEventListener('click', function () {
            if (validarFormulario()) {
            }
        });

        function validarFormulario() {
            // Reiniciar los estilos de los campos y los mensajes de error
            reiniciarEstilos();

            let formularioValido = true;

            // Validación del campo "Nombre de Contacto"
            const nombreInputValue = nombreInput.value.trim();
            if (nombreInputValue === "") {
                mostrarError(nombreInput, "El campo 'Nombre de Contacto' no puede estar vacío.");
                formularioValido = false;
            }

            // Validación del campo "Empresa"
            const empresaInputValue = empresaInput.value.trim();
            if (empresaInputValue === "") {
                mostrarError(empresaInput, "El campo 'Empresa' no puede estar vacío.");
                formularioValido = false;
            }

            // Validación del campo "Correo"
            const correoInputValue = correoInput.value.trim();
            if (correoInputValue === "" || !validarCorreo(correoInputValue)) {
                mostrarError(correoInput, "Ingrese un correo válido en el formato correcto.");
                formularioValido = false;
            }

            // Validación del campo "Descripción de Proyecto"
            const descripcionInputValue = descripcionInput.value.trim();
            if (descripcionInputValue === "" || descripcionInputValue.length < 20) {
                mostrarError(descripcionInput, "La descripción debe ser más larga.");
                formularioValido = false;
            }

            // Validación del campo "Teléfono"
            const telefonoInputValue = telefonoInput.value.trim();
            if (telefonoInputValue === "" || telefonoInputValue.length < 10) {
                mostrarError(telefonoInput, "El Campo Teléfono no puede estar vacío y debe contener al menos 10 dígitos.");
                formularioValido = false;
            }

            // Validación del campo "País"
            if (paisSelect.value === "Selecciona un país") {
                mostrarError(paisSelect, "Por favor, selecciona un país.");
                formularioValido = false;
            }

            // Validación del campo "Tipo de Proyecto"
            const tipoProyectoRadios = document.getElementsByName('tipo-proyecto');
            let tipoProyectoSeleccionado = false;
            tipoProyectoRadios.forEach(radio => {
                if (radio.checked) {
                    tipoProyectoSeleccionado = true;
                }
            });
            if (!tipoProyectoSeleccionado) {
                mostrarError(tipoProyectoRadios[0], "Por favor, selecciona un tipo de proyecto.");
                formularioValido = false;
            }

            return formularioValido;
        }

        function validarCorreo(correo) {
            const regex = /\S+@\S+\.\S+/;
            return regex.test(correo);
        }

        function reiniciarEstilos() {
            const elementos = [nombreInput, empresaInput, correoInput, descripcionInput, telefonoInput, paisSelect];
            elementos.forEach(elemento => {
                elemento.classList.remove('error-border');
                const errorSpan = document.getElementById(elemento.id + '-error');
                if (errorSpan) {
                    errorSpan.textContent = "";
                }
            });
        }

        function mostrarError(elemento, mensaje) {
            elemento.classList.add('error-border');
            const errorSpan = document.getElementById(elemento.id + '-error');
            if (errorSpan) {
                errorSpan.textContent = mensaje;
            }
        }
    </script>
</body>


</html>