<?php
session_start();
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soft-Brain</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">

</head>
<style>
    .redes img {
        width: 35px;
        transition: transform 0.3s; /* Agregar una transición para hacerlo suave */
    }

    .redes img:hover {
        transform: scale(1.5); /* Aumentar el tamaño al 120% en hover */
    }

    .redes img:not(:hover) {
        transform: scale(1); /* Volver al tamaño original en not hover */
    }

    .videopresentacion{
        width: 60%;
        border: 2px solid black;
        border-radius: 10px;
    }

    .redes {
        display: flex;
        justify-content: center;
        position: absolute;
        bottom: 40px;
    }

    @media (max-width: 768px) {
        .redes {
            display: flex;
            justify-content: center;
            align-items: center;
            position: unset;
        }
        .videopresentacion{
        width: 100%;
    }

    }


</style>


<body>


    <div class="container">
        <div class="titulo">
            <h1>[Soft-Brain SpA]</h1>
            <p style="color: black;">Para enviar tu cotización, por favor inicia sesión y luego nos pondremos en contacto contigo.</p>
            <video class="videopresentacion" src="videos/videoportada.mp4" autoplay controls muted></video>
        </div>

        
        <div class="descripcion">
            <h3 class="titulosecundario">Preguntas Frecuentes</h3>
            <!-- Primer Pregunta -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Qué servicios ofrece Soft-Brain?</button>
            <div class="panel">
                <p>En Soft-Brain ofrecemos servicios de desarrollo web, marketing en línea y soporte técnico.</p>
            </div>

            <!-- Segunda Pregunta -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Cómo puedo contactar a Soft-Brain?</button>
            <div class="panel">
                <p>Puede contactarnos a través de nuestro formulario de contacto en el sitio web o llamando al número de
                    teléfono proporcionado en la sección "Contacto".</p>
            </div>

            <!-- Tercera Pregunta (Inventada) -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Cuál es el tiempo de respuesta para el soporte técnico?</button>
            <div class="panel">
                <p>Nuestro equipo de soporte técnico se esfuerza por responder en un plazo de 24 horas hábiles después
                    de recibir su solicitud.</p>
            </div>
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Cuál es el costo de los servicios de Soft-Brain?</button>
            <div class="panel">
                <p>El costo de nuestros servicios varía según las necesidades específicas de cada proyecto. Te
                    recomendamos contactarnos para obtener un presupuesto personalizado y gratuito.</p>
            </div>

            <!-- Quinta Pregunta (Inventada) -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Tienen experiencia en el desarrollo de tiendas en línea?</button>
            <div class="panel">
                <p>Sí, en Soft-Brain contamos con amplia experiencia en el desarrollo de tiendas en línea. Hemos
                    trabajado con numerosos clientes para crear exitosas plataformas de comercio electrónico que han
                    incrementado sus ventas en línea.</p>
            </div>

            <!-- Sexta Pregunta (Inventada) -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Qué plataformas de comercio electrónico recomiendan para mi negocio?</button>
            <div class="panel">
                <p>Recomendamos plataformas de comercio electrónico como Shopify, WooCommerce y Magento, dependiendo de
                    tus necesidades y presupuesto. Trabajaremos contigo para determinar la mejor opción para tu negocio.
                </p>
            </div>

            <!-- Séptima Pregunta (Inventada) -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Pueden ayudarme a mejorar mi presencia en redes sociales?</button>
            <div class="panel">
                <p>Sí, ofrecemos servicios de marketing en redes sociales para aumentar la visibilidad de tu negocio en
                    plataformas como Facebook, Instagram y LinkedIn. Creamos estrategias personalizadas para mejorar tu
                    presencia en las redes sociales y atraer a tu público objetivo.</p>
            </div>

            <!-- Octava Pregunta (Inventada) -->
            <button class="accordion"><i class="far fa-question-circle"></i> ¿Qué garantías ofrecen en el servicio técnico?</button>
            <div class="panel">
                <p>Garantizamos un servicio técnico de alta calidad. Si experimentas problemas con nuestros servicios,
                    nuestro equipo de soporte técnico trabajará diligentemente para solucionar cualquier inconveniente y
                    asegurarse de que tus sistemas funcionen de manera óptima.</p>
            </div>
        </div>
        
        <script>

            const accordions = document.querySelectorAll(".accordion");
            for (const accordion of accordions) {
                accordion.addEventListener("click", function () {
                    this.classList.toggle("active");
                    const panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                const slides = document.querySelectorAll(".slider img");

                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }

                slideIndex++;

                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }

                slides[slideIndex - 1].style.display = "block";
                setTimeout(showSlides, 3000); // Cambia la imagen cada 3 segundos (ajusta el valor según tus necesidades)
            }

        </script>
        
</body>

</html>