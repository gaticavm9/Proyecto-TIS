<?php 
    $aux=0;
    $aux2=0;
    require("conexion.php");
    $patente = $_POST["patente"];
    $consulta1 = "SELECT * FROM ingreso where patente = '$patente'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $count1 = "SELECT * from ingreso where patente = '$patente'";
    $countingreso = mysqli_query($conexion, $count1);
    $count2 = "SELECT * from salida where patente = '$patente'";
    $countsalida = mysqli_query($conexion, $count2);

    $consultatrabajador = "SELECT id_personal from automovil where patente = '$patente'";
    $resultaux = mysqli_query($conexion, $consultatrabajador);
    while($row=mysqli_fetch_array($resultaux)){
        $id_personal = $row["id_personal"]; 
        $aux2=1;                                
    }
    if($aux2 == 1){
        $consultatrabajadoraux = "SELECT area from trabajador where id_personal = '$id_personal'";
        $resultaux2 = mysqli_query($conexion, $consultatrabajadoraux);
        while($row=mysqli_fetch_array($resultaux2)){
            $area = $row["area"];
            $aux=1;                                    
        }
    }
    if($aux == 1){
        if($area == 'Temporal'){
            $update = "UPDATE trabajador SET autorizacion='Denegado' WHERE id_personal='$id_personal'";
            $resultado = mysqli_query($conexion, $update);
        }
    }
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
                        $rowingreso = mysqli_num_rows($countingreso);
                        $rowsalida = mysqli_num_rows($countsalida);
                        date_default_timezone_set('America/Santiago');
                        $fecha_actual = date("Y-m-d H:i:s");
                        if(($rowingreso-$rowsalida)==1){
                            while($row=mysqli_fetch_array($resultado1)){
                                $id_ingreso = $row["id_ingreso"];  
                                $id_estacionamiento = $row["id_estacionamiento"]; 
                                $fecha_ingreso =  $row["fecha_ingreso"];
                            
                            }
                            $set = "UPDATE ingreso SET estado = 'Fuera' WHERE id_ingreso = '$id_ingreso'";
                            $resultado = mysqli_query($conexion, $set);
                            $insert1 = "INSERT INTO salida (id_salida, id_estacionamiento, patente, fecha_salida) VALUES (null, '$id_estacionamiento', '$patente', '$fecha_actual')";
                            $resultado2 = mysqli_query($conexion, $insert1);
                            $consulta2 = "SELECT * FROM salida where patente = '$patente'";
                            $resultadoconsulta2 = mysqli_query($conexion, $consulta2);
                            while($row2=mysqli_fetch_array($resultadoconsulta2)){
                                $id_salida = $row2["id_salida"];  
                                $fecha_salida =  $row2["fecha_salida"];
                            
                            }
                            $registrofinal = $insert1 = "INSERT INTO registroestacionamiento (id_registro, patente, id_ingreso, id_salida, fecha_ingreso, fecha_salida) VALUES (null, '$patente', '$id_ingreso', '$id_salida', '$fecha_ingreso', '$fecha_salida')";
                            $resultado3 = mysqli_query($conexion, $registrofinal);
                            echo "<br><h1>Se ha registrado la salida del vehiculo con patente $patente a la fecha $fecha_salida</h1>";
                        }else{
                            echo "<br>";
                            echo "<br>";
                            echo "<h1>Error de salida, El número de ingresos y salidas del automóvil no concuerdan.</h1>";

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