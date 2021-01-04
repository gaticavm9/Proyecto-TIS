<?php 
    require("conexion.php");
    include('barra.php');
    include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <title>Estacionamiento</title>
</head>
<body>
<div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
                        <br>
                        <br>
                        <br>
                        <h2>Patente del automóvil que esta intentando salir del estacionamiento:</h2>
                        <br>
                        <br>
                        <form action="registrosalidaestacionamiento.php" method="POST">
                                <input style='width:20%' type="text" minlength="6" maxlength="6" placeholder="patente" name="patente" required>
                                <br>
                                <button style='margin-top:5px' type=submit>Salir del estacionamiento</button>
                                
                        </form>
                        <br>
                        <form action='consultar.php' method='GET'>
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





</body>
</html>