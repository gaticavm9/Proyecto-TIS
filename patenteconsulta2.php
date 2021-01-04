<?php
    include("barra.php"); 
    include("menu.php");
    include("conexion.php");
    $patente =$_POST["patente"];
    $consulta= "SELECT * from automovil, trabajador where automovil.patente='$patente' and trabajador.autorizacion='Autorizado' and automovil.id_personal=trabajador.id_personal";
    $resultado = mysqli_query($conexion, $consulta);
    $rows = mysqli_num_rows($resultado);
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
                    <?php 
                        if($rows==0){
                            echo " <h1>Lamentamos informarle que usted no posee permiso para estacionarse en la universidad.</h1>  ";
                        }else{
                            echo "<h1>Usted posee permiso para estacionarse en la universidad.</h1>";
                        }
                    ?>
                    <div style= "display: inline-block;">
                        <br>
                        <form action='index.php' method='GET'>
    			            <button class='boton' type='submit' style='background-color:rgb(178,34,34); 
														border:none; color:white; 
														 
														text-align:center; 
														display:inline-block;
														font-size:12px;
														width:200px;
														height:20px;
														margin-top:10px'
														>
                                <span>
                                    Volver al inicio
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