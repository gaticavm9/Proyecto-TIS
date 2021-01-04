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
                    <h1>Ingreso y salida de vehículos del estacionamiento.</h1>
                    <br>
                    <div style= "display: inline-block;">
                        <form action="validacionsimulacioni.php" method="POST">
                            <button class='boton' type="submit" style="background-color:red; 
                                                                    border:none; color:white; 
                                                                    padding:10px; 
                                                                    text-align:center; 
                                                                    display:inline-block;
                                                                    font-size:16px;
                                                                    width:250px;
                                                                    margin-top:10px"
                                                                    >
                                <span>
                                    Entrada Automóvil
                                </span>
                            </button>
                        </form>
                        <form action="salidaestacionamiento.php" method="POST">
                            <button class='boton' type="submit" style="background-color:red; 
                                                                    border:none; color:white; 
                                                                    padding:10px; 
                                                                    text-align:center; 
                                                                    display:inline-block;
                                                                    font-size:16px;
                                                                    width:250px;
                                                                    margin-top:10px"
                                                                    >
                                <span>
                                    Salida Automóvil
                                </span>
                            </button>
                        </form>
                        <form action='index.php' method='GET'>
                            <br><br>
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