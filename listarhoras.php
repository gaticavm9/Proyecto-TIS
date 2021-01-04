<?php
  include("auth.php"); 
  include("barra2.php"); 
  include("conexion.php");
  include("menu.php");
  $consulta = "SELECT DISTINCT(patente) FROM registroestacionamiento";
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
                        <h3>Seleccione la patente de la cual quiere obtener la información:</h3>
                        <br><br>
                        <form action='' name='listarhoras' method='POST'>
                        <select style='width:20%' name='patente' style='width:180px;height: 21px;' required>
                            <option value="">Patente</option>
                        <?php  foreach ($resultado as $opciones): ?>
                            <option value="<?php  echo $opciones['patente']?>"><?php  echo $opciones['patente']?></option>
                        <?php  endforeach ?>
                        </select>
                        <br>
                        <button style='margin-top:5px' type=submit>Consultar patente</button>
                        </form>
                        <?php
                            if (isset($_POST['patente'])){
                                $patente = $_POST['patente'];
                                $consulta1= "SELECT * FROM registroestacionamiento WHERE patente='$patente'"; 
                                $resultado1= mysqli_query($conexion, $consulta1);
                                echo "<table style='width:500px; font-size: 15px; margin-left:auto; margin-right:auto;'>
                                <br><br>
                                    <thead>
                                        <tr>
                                            <th>Patente</th>
                                            <th>Fecha ingreso</th>
                                            <th>Fecha salida</th>
                                            <th>Estacionamiento ocupado</th>
                                            <th>Minutos en estacionamiento</th>
                                        </tr>
                                    </thead>";
                                
                                while($row=mysqli_fetch_array($resultado1)){
                                    $patente = $row["patente"];
                                    $fecha_ingreso = $row["fecha_ingreso"];
                                    $fecha_salida = $row["fecha_salida"];
                                    $id_ingreso = $row["id_ingreso"];
                                    $consulta2 = "SELECT DISTINCT(ubicacion) FROM estacionamiento, ingreso WHERE id_ingreso='$id_ingreso' AND ingreso.id_estacionamiento=estacionamiento.id_estacionamiento";
                                    $resultado2 = mysqli_query($conexion, $consulta2);
                                    while($row1=mysqli_fetch_array($resultado2)){
                                        $ubicacion = $row1["ubicacion"];
                                    }
                                    $dateDifference = abs(strtotime($fecha_salida) - strtotime($fecha_ingreso));
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$patente."</td>";
                                    echo "<td>".$fecha_ingreso."</td>";
                                    echo "<td>".$fecha_salida."</td>";
                                    echo "<td>".$ubicacion."</td>";
                                    echo "<td>".round(($dateDifference/60),2)."</td>";
                                    echo "</tbody>";

                                }
                                echo "</table>";
                            }
                        ?>



<?php 

echo "<div style='display:inline'>

<br>
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
						Atrás
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