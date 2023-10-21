<?php
session_start();
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">
    <style>
        .mapa {
            text-align: center;
        }

        .mapa iframe {
            border-radius: 20px;
            width: 90%;
        }

        .servicio-tecnico, .duenos {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        .servicio-tecnico h2, .duenos h2 {
            font-size: 24px;
            color: #333;
        }

        .servicio-tecnico p, .duenos ul {
            font-size: 16px;
            color: #666;
        }

        .servicio-tecnico p {
            margin-top: 10px;
        }

        .duenos ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        #logoempresa{
            margin: 0 auto;
            text-align: center;
        }
        #logoempresa img{
            width: 350px;
            display: block;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <div class="titulo"><h1>Sobre Nosotros</h1></div>
        <p>En Soft-brain, nuestro equipo de servicio técnico altamente calificado está dedicado a garantizar que sus sistemas y aplicaciones funcionen sin problemas. Estamos disponibles las 24 horas del día, los 7 días de la semana, para brindar soporte técnico confiable y eficiente. Ya sea que necesite resolver problemas técnicos, asesoramiento o mantenimiento preventivo, estamos aquí para ayudar.</p>
        <div id="logoempresa"> <img src="imagenes/logov2.png" alt=""></div>
        <!-- Información sobre el servicio técnico -->
        <div class="servicio-tecnico">
            <h2>Servicio Técnico</h2>
            <p>En Soft-brain, ofrecemos servicios técnicos confiables y eficientes para garantizar el funcionamiento ininterrumpido de los sistemas y aplicaciones de nuestros clientes. Nuestro equipo de técnicos altamente capacitados está disponible para resolver problemas técnicos, brindar asesoramiento y realizar mantenimiento preventivo. La satisfacción del cliente es nuestra principal prioridad en cada interacción con el servicio técnico.</p>
        </div>
        
        <!-- Información sobre los dueños de la empresa -->
        <div class="duenos">
            <h2>Equipo Fundador</h2>
            <ul>
                <li><strong>Lucas Jimenez:</strong> Co-fundador y Director Ejecutivo. Lucas es un experto en tecnología con una amplia experiencia en el desarrollo de soluciones digitales innovadoras. Su visión y liderazgo son fundamentales para el éxito de Soft-brain.</li>
                <li><strong>Jorge Bustamante:</strong> Co-fundador y Director de Operaciones. Jorge supervisa la gestión diaria de la empresa y garantiza la entrega puntual de servicios de alta calidad. Es un apasionado de la eficiencia operativa.</li>
                <li><strong>Matías Olivares:</strong> Co-fundador y Director de Marketing. Matías es el cerebro creativo detrás de nuestras estrategias de marketing digital. Su enfoque en la generación de leads y la mejora de la conversión ha impulsado el crecimiento de nuestros clientes.</li>
            </ul>
        </div>
        
        <div class="mapa">
            <!-- Mapa de ubicación -->
            <h3>Nuestra Ubicacion (Soporte Tecnico)</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3251.0500174571857!2d-71.67561149033104!3d-35.42879096632245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9665c41ed574bf39%3A0xc72ac71c1b588758!2sAv.%20Carlos%20Schorr%20255%2C%203460000%20Talca%2C%20Maule!5e0!3m2!1ses!2scl!4v1697508722102!5m2!1ses!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>
