<?php 
    require("conexion.php");
    $patente = $_POST["patente"];
    $ubicacion = $_POST["ubicacion"];
    $consulta1 = "SELECT * FROM automovil, trabajador where patente = '$patente' and automovil.id_personal = trabajador.id_personal";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $consulta2 = "SELECT * FROM estacionamiento where ubicacion = '$ubicacion'";
    $resultado2 = mysqli_query($conexion, $consulta2);
    include('barra.php');
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
                    <?php 
                        while($row=mysqli_fetch_array($resultado2)){
                            $id_estacionamiento = $row["id_estacionamiento"]; 
                        }

                        while($row=mysqli_fetch_array($resultado1)){
                            $id_personal = $row["id_personal"];  
                            $patente = $row["patente"]; 
                            $nombre = $row["nombre"];
                            $autorizacion =  $row["autorizacion"];
                            
                                echo "<br>";
                                echo "<br>";
                                date_default_timezone_set('America/Santiago');
                                $fecha_actual = date("Y-m-d H:i:s");
                                $insert1 = "INSERT INTO ingreso (id_ingreso, id_estacionamiento, patente, fecha_ingreso, estado) VALUES (null, '$id_estacionamiento', '$patente', '$fecha_actual', 'Dentro')";
                                $resultado2 = mysqli_query($conexion, $insert1);
                                echo "<h1>Se ha registrado el ingreso al estacionamiento del edificio $ubicacion de la universidad, en la fecha $fecha_actual</h1>";                              
                        } 
                    ?>
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
</body>
</html>