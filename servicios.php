<?php
session_start();
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">

</head>

<style>
    .contenedorimg {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        overflow: hidden;
        text-align: center;
        margin-top: 30px;
    }

    .imagenes {
        width: 50%;
        text-align: center;
        margin-bottom: 20px;
        border-radius: 10px;
        border: 2px solid rgb(0, 0, 0);
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .imagenes {
            width: 96%;
        }
    }

    /* Estilo para la pantalla modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
        overflow: hidden;
    }

    .modal-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .modal-image {
        max-width: 90%;
        max-height: 90%;
        border-radius: 30px;
    }

    .panel {
        margin-left: 0;
    }

    .panel .panel {
        margin-left: 15px;
        /* Aumenta este valor según tu preferencia */
    }

    .panel .panel .panel {
        margin-left: 30px;
        /* Aumenta este valor según tu preferencia */
    }

    .slide-container .prev,
    .slide-container .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: all 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .slide-container .prev:hover,
    .slide-container .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
    }

    .slide-container .prev {
        left: 2px;
    }

    .slide-container .next {
        right: 2px;
    }

    .dots-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .dots-container .dot {
        cursor: pointer;
        margin: 5px;
        width: 20px;
        height: 20px;
        color: #333;
        border-radius: 50%;
        background-color: #dfd6ce;
    }

    .dots-container .dot.active {
        border: 2px solid green;
    }


    .slide-container {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 500px;
        margin: auto;
        position: relative;
    }

    .slide-container .slide {
        display: none;
        width: 100%;
    }

    .slide-container .slide.fade {
        animation: fade 0.5s cubic-bezier(0.55, 0.085, 0.68, 0.53) both;
    }

    .slide-container .slide img {
        width: 100%;
    }
</style>

<body>

    <div class="container">
        <div class="titulo">
            <h1>Nuestros Servicios</h1>
        </div>
        <p>Soft-brain es una empresa líder en innovación tecnológica, dedicada a brindar soluciones integrales para
            satisfacer las necesidades digitales de empresas
            y emprendedores. Nuestra misión es potenciar el éxito de nuestros clientes en el mundo en línea a través de
            una amplia gama de servicios especializados,</p>
        <div class="descripcion">
            <h3 class="titulosecundario">Preguntas Frecuentes</h3>
            <!-- Primer Pregunta -->
            <button class="accordion"><i class="fas fa-question-circle fa-spin"></i> ¿Qué servicios ofrece
                Soft-Brain?</button>
            <div class="panel">
                <button class="accordion"><i class="fas fa-desktop"></i> Servicio Tecnico</button>
                <div class="panel">
                    <button class="accordion"><i class="fas fa-memory"></i> Ampliación de RAM</button>
                    <div class="panel">
                        <p>En nuestros servicios, podemos aumentar la cantidad de memoria RAM de sus computadoras para
                            que funcionen más rápido y manejen múltiples tareas sin problemas. Experimentarán una mejora
                            significativa en el rendimiento.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-hdd"></i> Reemplazo de Disco Duro por SSD</button>
                    <div class="panel">
                        <p>Si sus computadoras están lentas, podemos reemplazar los discos duros tradicionales por SSDs
                            de alta velocidad. Notarán un arranque más rápido y una mayor capacidad de respuesta en
                            todas sus aplicaciones.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-screwdriver"></i> Limpieza y Mantenimiento</button>
                    <div class="panel">
                        <p>Ofrecemos servicios de limpieza y mantenimiento para eliminar el polvo acumulado y
                            asegurarnos de que la ventilación esté en óptimas condiciones. Esto ayudará a prevenir el
                            sobrecalentamiento y a prolongar la vida útil de sus equipos.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-cogs"></i> Optimización de Software</button>
                    <div class="panel">
                        <p>Podemos limpiar y optimizar sus sistemas operativos, eliminando software no deseado y
                            mejorando la velocidad de inicio. Sus PCs se sentirán más ágiles.</p>
                    </div>
                    <button class="accordion"><i class="fas fa-virus"></i> Eliminación de Virus y Malware</button>
                    <div class="panel">
                        <p>Nuestro equipo de expertos puede escanear y eliminar virus, malware y otras amenazas de
                            seguridad de sus dispositivos, asegurando un entorno de trabajo seguro y protegido.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-network-wired"></i> Configuración de Red</button>
                    <div class="panel">
                        <p>Ofrecemos servicios de configuración de redes para optimizar la conectividad de sus
                            dispositivos, ya sea en su hogar o lugar de trabajo. Esto incluye la instalación y
                            configuración de routers, switchs y conexiones Wi-Fi.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-sync"></i> Respaldo de Datos</button>
                    <div class="panel">
                        <p>Realizamos copias de seguridad regulares de sus datos importantes para prevenir la pérdida de
                            información crítica. Ya sea en la nube o en dispositivos externos, su información estará
                            segura y accesible en caso de emergencia.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-file-code"></i> Reparación de Software</button>
                    <div class="panel">
                        <p>Si experimenta problemas con el sistema operativo, aplicaciones o programas, nuestros
                            expertos pueden diagnosticar y reparar problemas de software para asegurarse de que sus
                            dispositivos funcionen sin interrupciones.</p>
                    </div>
                </div>
                <button class="accordion"><i class="fas fa-chart-bar"></i> Estrategias de Marketing</button>
                <div class="panel">
                    <button class="accordion"><i class="fas fa-share-alt"></i> Publicidad en Redes Sociales</button>
                    <div class="panel">
                        <p>Nuestra agencia puede crear y gestionar campañas publicitarias efectivas en redes sociales
                            para aumentar la visibilidad de su marca y atraer a su audiencia objetivo.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-envelope"></i> Email Marketing</button>
                    <div class="panel">
                        <p>Le ayudaremos a diseñar estrategias de email marketing para llegar a sus clientes de manera
                            efectiva, proporcionando contenido relevante y promociones especiales.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-search"></i> SEO y Optimización de Contenido</button>
                    <div class="panel">
                        <p>Nuestros expertos en SEO pueden optimizar su contenido web y mejorar su clasificación en los
                            motores de búsqueda, lo que aumentará el tráfico orgánico a su sitio web.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-pencil-alt"></i> Marketing de Contenidos</button>
                    <div class="panel">
                        <p>Desarrollamos estrategias de marketing de contenidos para crear contenido relevante y valioso
                            que atraiga a su audiencia y fortalezca su presencia en línea.</p>
                    </div>
                </div>
                <button class="accordion"><i class="fas fa-code"></i> Creación de Páginas WEB</button>
                <div class="panel">
                    <button class="accordion"><i class="fas fa-paint-brush"></i> Diseño de Sitios Web
                        Personalizados</button>
                    <div class="panel">
                        <p>Crearemos un sitio web a medida que se adapte a sus necesidades y refleje la identidad de su
                            marca, brindando una experiencia única a sus visitantes.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-shopping-cart"></i> Tiendas en Línea</button>
                    <div class="panel">
                        <p>Desarrollamos tiendas en línea seguras y funcionales que le permiten vender sus productos o
                            servicios en línea, con opciones de pago y gestión de inventario.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-blog"></i> Blogging y Gestión de Contenido</button>
                    <div class="panel">
                        <p>Si necesita un blog o desea mantener su sitio actualizado, ofrecemos servicios de gestión de
                            contenido para crear y administrar publicaciones informativas y atractivas.</p>
                    </div>

                    <button class="accordion"><i class="fas fa-mobile-alt"></i> Optimización para Dispositivos
                        Móviles</button>
                    <div class="panel">
                        <p>Adaptaremos su sitio web para que se vea y funcione de manera óptima en dispositivos móviles,
                            asegurando una experiencia fluida para los visitantes desde cualquier dispositivo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slide-container">
            <div class="slide fade">
                <img class="imagenes" src="flayers/flayer1.png" alt="imagen1"
                    onclick="openModal('flayers/flayer1.png')">
            </div>
            <div class="slide fade">
                <img class="imagenes" src="flayers/flayer2.png" alt="imagen2"
                    onclick="openModal('flayers/flayer2.png')">
            </div>
            <div class="slide fade">
                <img class="imagenes" src="flayers/flayer3.png" alt="imagen3"
                    onclick="openModal('flayers/flayer3.png')">
            </div>

            <a href="javascript:void(0)" class="prev" title="Previous">&#10094</a>
            <a href="javascript:void(0)" class="next" title="Next">&#10095</a>
        </div>
        <div class="dots-container">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <!-- Pantalla modal -->
    <div id="myModal" class="modal">
        <span class="modal-content">
            <img id="modalImage" class="modal-image">
        </span>
    </div>





    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll(".slide")
        const dots = document.querySelectorAll('.dot')

        const init = (n) => {
            slides.forEach((slide, index) => {
                slide.style.display = "none"
                dots.forEach((dot, index) => {
                    dot.classList.remove("active")
                })
            })
            slides[n].style.display = "block"
            dots[n].classList.add("active")
        }
        document.addEventListener("DOMContentLoaded", init(currentSlide))
        const next = () => {
            currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++
            init(currentSlide)
        }

        const prev = () => {
            currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--
            init(currentSlide)
        }

        document.querySelector(".next").addEventListener('click', next)

        document.querySelector(".prev").addEventListener('click', prev)


        setInterval(() => {
            next()
        }, 5000);

        dots.forEach((dot, i) => {
            dot.addEventListener("click", () => {
                console.log(currentSlide)
                init(i)
                currentSlide = i
            })
        })


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
        function openModal(imageUrl) {
            const modal = document.getElementById('myModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
            modal.style.display = 'block';
        }

        const modal = document.getElementById('myModal');
        modal.onclick = function () {
            modal.style.display = 'none';
        };
    </script>
</body>

</html>