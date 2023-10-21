<?php
session_start();
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">
    
    
    <style>
        .slider-container {
            width: 510px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .slider {
            width: 1000px;
            text-align: center;
        
        }

        .slide {
            width: 500px;
            float: left;
            text-align: center;
            position: relative;
        }

        .slide img {
            width: 500px;
        }

        .download-button {
            display: block;
            margin-top: 10px;
            padding-bottom: 20px;
            text-decoration: none;
            padding: 10px;
            background-color: rgb(201, 201, 201);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            margin-bottom: 20px;
            border: 2px solid rgb(0, 0, 0);
        }

        .download-button:hover {
            background-color: rgb(131, 130, 130);
        }
        .slider-nav {
            text-align: center;
        }

        .slider-button {
            background-color: rgb(131, 130, 130);
            color: white;
            font-weight: 600;
            border-radius: 20px;
            margin-bottom: 20px;
            border: 2px solid red;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .slider-button:hover {
            background-color: rgb(201, 201, 201);
        }
        @media (max-width: 768px) {
            .slider-container{
                width: 310px;
            }
            .slide {
                width: 300px;
            }
            .slide img{
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="titulo"><h1>Nuestros Trabajos</h1></div>
        <div class="slider-container">
            <div class="slider">
                <div class="slide">
                    <img src="trabajos/DulcesSaldados.png" alt="Imagen 1">
                    <a class="download-button" href="trabajos/DulcesSaldados.pdf" download>Descargar</a>
                </div>
                <div class="slide">
                    <img src="flayers/flayer2.png" alt="Imagen 2">
                    <a class="download-button" href="descargar2.jpg" download>Descargar</a>
                </div>
            </div>
            <div class="slider-nav">
                <button class="slider-button prev" onclick="moveSlider(-1)">Anterior</button>
                <button class="slider-button next" onclick="moveSlider(1)">Siguiente</button>
            </div>
        </div>
    </div>


    <script>
        let slideIndex = 1;

        function showSlide(n) {
            const slides = document.querySelectorAll('.slide');
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slides[slideIndex - 1].style.display = 'block';
        }

        function moveSlider(n) {
            showSlide(slideIndex += n);
        }

        showSlide(slideIndex);
    </script>
</body>
</html>
