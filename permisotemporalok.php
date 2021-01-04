<?php
    include("barra2.php"); 
    include("menu.php");
    include("conexion.php");
    
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
                    <h2>Se ha generado un permiso temporal.</h2>

                    <div style= "display: inline-block;">
                    
                    <br>
                    <?php 

                        echo "
                            <br><br>
                            <form action='permisotemporal.php' method='GET'>
                            
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
                        </form>";
                        ?>

                    </div>
                        
                </div>
            </div>          
        </div>
    </div>



</body>
</html>