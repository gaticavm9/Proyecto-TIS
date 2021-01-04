<?php
  include("auth.php"); 
  include("barra2.php"); 
  include("conexion.php");
  include("menu.php");
  $consulta = "SELECT ubicacion FROM estacionamiento";
  $resultado = mysqli_query($conexion, $consulta);
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
                        <br><br>
                        <h3>Seleccione el estacionamiento del cual quiere obtener información:</h3>
                        <br><br>
                        <form action='' name='listrarautosestacionamiento' method='POST'>
                        <select style='width:30%' name='ubicacion' style='width:180px;height: 21px;'>
                        <option value="todos">Todos los estacionamientos</option>
                        <?php  foreach ($resultado as $opciones): ?>
                        <option value="<?php  echo $opciones['ubicacion']?>"><?php  echo $opciones['ubicacion']?></option>
                        <?php  endforeach ?>
                        </select>
                        <br>
                        <button style='margin-top:5px' type=submit>Consultar estacionamiento</button>
                        </form>
                        <?php
                            if (isset($_POST['ubicacion'])){
                                if($_POST['ubicacion']=='todos'){
                                    $consulta1= "SELECT * FROM ingreso, estacionamiento WHERE ingreso.id_estacionamiento=estacionamiento.id_estacionamiento AND ingreso.estado='Dentro'"; 
                                    $resultado1= mysqli_query($conexion, $consulta1);
                                    $rows = mysqli_num_rows($resultado1);
                                    if($rows!=0){
                                    echo "<table style='width:500px; font-size: 15px; margin-left:auto; margin-right:auto;'>
                                    <br><br>
                                    <h4>Listado de automóviles que se encuentran estacionados en el campus:</h4>
                                    <br>
                                        <thead>
                                            <tr>
                                                <th>Estacionamiento</th>
                                                <th>Patente</th>
                                                <th>Fecha ingreso</th>
                                                <th>Minutos en estacionamiento</th>
                                            </tr>
                                        </thead>";
                                
                                    while($row=mysqli_fetch_array($resultado1)){
                                        $patente = $row["patente"];
                                        $fecha_ingreso = $row["fecha_ingreso"];
                                        $ubicacion = $row["ubicacion"];
                                        date_default_timezone_set('America/Santiago');
                                        $fecha_actual = date("Y-m-d H:i:s");
                                        $dateDifference = abs(strtotime($fecha_actual) - strtotime($fecha_ingreso));
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>".$ubicacion."</td>";
                                        echo "<td>".$patente."</td>";
                                        echo "<td>".$fecha_ingreso."</td>";
                                        echo "<td>".round(($dateDifference/60),2)."</td>";
                                        echo "</tbody>";
                                    }
                                    echo "</table>";
                                    }else{
                                        echo " <br><h2>No hay automóviles estacionados en este momento.</h2> ";
                                    }
                                }else{
                                $ubicacion = $_POST['ubicacion'];
                                $consulta1= "SELECT * FROM ingreso, estacionamiento WHERE estacionamiento.ubicacion='$ubicacion' AND ingreso.id_estacionamiento=estacionamiento.id_estacionamiento AND ingreso.estado='Dentro'"; 
                                $resultado1= mysqli_query($conexion, $consulta1);
                                $rows = mysqli_num_rows($resultado1);
                                if($rows!=0){
                                echo "<table style='width:500px; font-size: 15px; margin-left:auto; margin-right:auto;'>
                                <br><br>
                                <h4>Listado de automóviles que se encuentran estacionados en $ubicacion:</h4>
                                    <br>
                                    <thead>
                                        <tr>
                                            <th>Estacionamiento</th>
                                            <th>Patente</th>
                                            <th>Fecha ingreso</th>
                                            <th>Minutos en estacionamiento</th>
                                        </tr>
                                    </thead>";
                                while($row=mysqli_fetch_array($resultado1)){
                                    $patente = $row["patente"];
                                    $fecha_ingreso = $row["fecha_ingreso"];
                                    date_default_timezone_set('America/Santiago');
                                    $fecha_actual = date("Y-m-d H:i:s");
                                    $dateDifference = abs(strtotime($fecha_actual) - strtotime($fecha_ingreso));
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$ubicacion."</td>";
                                    echo "<td>".$patente."</td>";
                                    echo "<td>".$fecha_ingreso."</td>";
                                    echo "<td>".round(($dateDifference/60),2)."</td>";
                                    echo "</tbody>";

                                }
                                echo "</table>";
                                }else{
                                    echo " <br><h2>No hay automóviles estacionados en este momento.</h2> ";
                                }

                                }
                            }
                        ?>



<?php 

echo "<div style='display:inline'>
<br><br>

<form action='usuario.php' method='GET'>
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
						Atras
					</span>
				</button>
			</form>
</div>";

?>
                    </div>
            </div>
        </div>
</div>

</body>
</html>