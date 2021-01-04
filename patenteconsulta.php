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
                    <br>
                    <h1>Estacionamiento UCSC</h1>
                    <br>
                    <img src="Imagenes/frontis.jpg" alt="estacionamiento" style='width:60%'>
                    <br>
                    <br>
                    <h4>Consulta aquí el estado de tu permiso para ingresar al estacionamiento. </h4>
                    <br>
                    <h5>Ingresa la patente de tu automóvil a continuación:</h2>
                    <br>
                    <div style= "display: inline-block;">
                        <form action='patenteconsulta2.php' method='POST'>
                            <input style='width:100%' type="text" minlength="6" maxlength="6" placeholder="patente" name="patente" required>
                            <br>
                            <button style='margin-top:5px' type=submit>Consultar permiso</button>
                        </form>
                        <br>
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