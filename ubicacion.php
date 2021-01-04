<?php
    include("barra.php"); 
    include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Estacionamiento</title>
</head>
<body>
    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                <div class="contenedor col-xs-1 col-lg-1">
                    <br>
                    <h2>¿Cómo llegar?</h2>
                    <div style="padding-left: 20px; padding-right: 20px;">
                    <div id="map"></div>
                    <script src="Funciones js\maps.js"></script>
                    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                    <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe0LJIdj5m6NTf_Qe9K43d2jsH8C7KkSA&callback=iniciarMap&libraries=&v=weekly"
                    defer
                    ></script>
                     <form action='index.php' method='GET'>
    			        <button class='boton' type='submit' style='background-color:rgb(178,34,34); 
                                                                border:none; color:white; 
                                                                
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:12px;
                                                                width:50px;
                                                                height:20px;
                                                                margin-top:10px'
                                                                >
                            <span>
                                Atrás
                            </span>
                        </button>
			        </form>
                </div>
                </div>
            </div>          
        </div>
    </div>
</body>
</html>