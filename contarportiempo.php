<?php
  include("auth.php"); 
  include("barra2.php"); 
  include("conexion.php");
  include("menu.php");
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>Estacionamiento</title>
</head>
<body>
    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
                        <br><br>
                        <h3>Seleccione el rango de fechas para consultar los datos:</h3>
                        <br><br>
                        <form action="" method="post" name="contarportiempo">
                            <input style='width:25%' type="date" name="fecha1" required>
                            <input style='width:25%; margin-left:10px' type="date" name="fecha2" required>
                            <br>
                            <button style='margin-top:5px' type=submit>Ingresar rango de fecha</button>
                        </form>
                        <?php
                            if (isset($_POST['fecha1']) && isset($_POST['fecha2'])){
                                $count1 = 0;
                                $count2 = 0;
                                $count3 = 0;
                                $count4 = 0;
                                $fecha1= $_POST["fecha1"]." 00:00:00";
                                $fecha2= $_POST["fecha2"]." 23:59:59";
                                if($fecha1 <= $fecha2){
                                $consulta = "SELECT * from registroestacionamiento WHERE (fecha_ingreso between '$fecha1' and '$fecha2') OR (fecha_salida between '$fecha1' and '$fecha2')";
                                $resultado = mysqli_query($conexion, $consulta);
                                $rows = mysqli_num_rows($resultado);
                                if($rows!=0){
                                echo "<table style='width:500px; font-size: 15px; margin-left:auto; margin-right:auto;'>
                                    <br><br>
                                    <h4>Listado de automóviles que se encuentran estacionados en el campus:</h4>
                                    <br>
                                        <thead>
                                            <tr>
                                                <th>Estacionamiento</th>
                                                <th>Patente</th>
                                                <th>Fecha del movimiento</th>
                                            
                                            </tr>
                                        </thead>";
                                        echo "<tbody>";
                                        echo "<tr>";
                                    while($row=mysqli_fetch_array($resultado)){
                                        $patente = $row["patente"];
                                        $id_ingreso = $row["id_ingreso"];
                                        $fecha_ingreso = $row["fecha_ingreso"];
                                        $consulta1 = "SELECT ubicacion from estacionamiento, ingreso WHERE ingreso.id_estacionamiento=estacionamiento.id_estacionamiento and ingreso.id_ingreso='$id_ingreso'";
                                        $resultado1 = mysqli_query($conexion, $consulta1);
                                        while($row1=mysqli_fetch_array($resultado1)){
                                            $ubicacion= $row1["ubicacion"];
                                            echo "<td>".$ubicacion."</td>";
                                            if($ubicacion=='Administracion'){
                                                $count1++;
                                            }
                                            if($ubicacion=='Historia'){
                                                $count2++;
                                            }
                                            if($ubicacion=='Ingenieria'){
                                                $count3++;
                                            }
                                            if($ubicacion=='Educacion'){
                                                $count4++;
                                            }
                                        }
                                        echo "<td>".$patente."</td>";
                                        echo "<td>".$fecha_ingreso."</td>";
                                        echo "</tbody>";

                                    }
                                    echo "</table>"; 
                                                
                                    echo "<div style='display:inline'>
                                                <br><br>
                                                <form action='grafico.php' method='POST'>
                                                    <input type='hidden' name='count1' value='".$count1."'>
                                                    <input type='hidden' name='count2' value='".$count2."'>
                                                    <input type='hidden' name='count3' value='".$count3."'>
                                                    <input type='hidden' name='count4' value='".$count4."'>
                                                    <button class='boton' type='submit' style='background-color:red; 
                                                                border:none; color:white; 
                                                                padding:10px; 
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:16px;
                                                                width:250px;
                                                                margin-top:10px'
                                                                >
                                                        <span>
                                                            Graficar
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>";
                                }else{
                                    echo " <br><h2>No hay registros de automóviles estacionados en este rango de fechas.</h2> ";
                                }

                                }else{
                                    echo " <h2>Rango de fechas inválido.</h2><h3>La fecha inicial debe ser inferior a la fecha final</h3> ";
                                }
                            }
                        ?>
                        
                        
                        
                       



<?php 
    echo "<div style='display:inline'>
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