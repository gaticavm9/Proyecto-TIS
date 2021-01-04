<?php 
    require("conexion.php");
    $patente = $_POST["patente"];
    $consulta1 = "SELECT * FROM automovil, trabajador where patente = '$patente' and automovil.id_personal = trabajador.id_personal";
    $resultado1 = mysqli_query($conexion, $consulta1);
    include('barra.php');
    $count1 = "SELECT * from ingreso where patente = '$patente'";
    $countingreso = mysqli_query($conexion, $count1);
    $count2 = "SELECT * from salida where patente = '$patente'";
    $countsalida = mysqli_query($conexion, $count2);
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
                        $rows = mysqli_num_rows($resultado1);
                        $rowingreso = mysqli_num_rows($countingreso);
                        $rowsalida = mysqli_num_rows($countsalida);
                        if($rows==1){
                        while($row=mysqli_fetch_array($resultado1)){
                            $id_personal = $row["id_personal"];  
                            $patente = $row["patente"]; 
                            $nombre = $row["nombre"];
                            $autorizacion =  $row["autorizacion"];
                         
                            if($autorizacion=='Autorizado'){
                                if(($rowingreso-$rowsalida)==0){
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<h1>Bienvenido al estacionamiento $nombre.</h1>";
                                    echo "<br>";
                                    echo "<h1>Seleccione el estacionamiento al que se dirige:</h1>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<form action='simulacioningreso.php' method='POST' style='display:inline'>
                                            <input type='hidden' name='patente' value='".$patente."'>

                                            <button class='boton' type='submit'  style='background-color:red; 
                                            border:none; color:white; 
                                            padding:10px; 
                                            text-align:center; 
                                            display:inline-block;
                                            font-size:16px;
                                            width:40%;
                                            height:90px;
                                            margin-top:20px;
                                            margin-left:20px;
                                            margin-right:20px'
                                            >
                                            <input type='hidden' name='ubicacion' value='Administracion'>
                                            <span>
                                                Administración
                                            </span>
                                        </button>
                                        </form>

                                        <form action='simulacioningreso.php' method='POST' style='display:inline'>
                                        <input type='hidden' name='patente' value='".$patente."'>
                                        <button class='boton' type='submit'  style='background-color:red; 
                                            border:none; color:white; 
                                            padding:10px; 
                                            text-align:center; 
                                            display:inline-block;
                                            font-size:16px;
                                            width:40%;
                                            height:90px;
                                            margin-top:20px;
                                            margin-left:20px;
                                            margin-right:20px'
                                            >
                                            <input type='hidden' name='ubicacion' value='Historia'>
                                            <span>
                                                Historia
                                            </span>
                                        </button>
                                        </form>

                                        <form action='simulacioningreso.php' method='POST' style='display:inline'>
                                        <input type='hidden' name='patente' value='".$patente."'>
                                        <button class='boton' type='submit' style='background-color:red; 
                                            border:none; color:white; 
                                            padding:10px; 
                                            text-align:center; 
                                            display:inline-block;
                                            font-size:16px;
                                            width:40%;
                                            height:90px;
                                            margin-top:20px;
                                            margin-left:20px;
                                            margin-right:20px'
                                            >
                                            <input type='hidden' name='ubicacion' value='Ingenieria'>
                                            <span>
                                                Ingeniería
                                            </span>
                                        </button>
                                        </form>


                                        <form action='simulacioningreso.php' method='POST' style='display:inline'>
                                        <input type='hidden' name='patente' value='".$patente."'>
                                        <button class='boton' type='submit'  style='background-color:red; 
                                            border:none; color:white; 
                                            padding:10px; 
                                            text-align:center; 
                                            display:inline-block;
                                            font-size:16px;
                                            width:40%;
                                            height:90px;
                                            margin-top:20px;
                                            margin-left:20px;
                                            margin-right:20px'
                                            >
                                            <input type='hidden' name='ubicacion' value='Educacion'>
                                            <span>
                                                Educación
                                            </span>
                                        </button>
                                        </form>";
                                }else{
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<h1>Error de ingreso, Los numeros de ingresos y salidas del automóvil no concuerdan.</h1>";

                                }
                                
                            }else{
                                echo "<br>";
                                echo "<br>";   
                                echo "<h1>Usted no posee permiso para estacionarse en la Universidad.</h1>";
                                echo "<br>";
                                echo "<br>";
                                echo "<form action='validacionsimulacioni.php' method='POST'>
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
                                                Intentar denuevo
                                            </span>
                                        </button>
                                       </form>";
                            }                               
                        } 
                    }else{
                        echo "<br>";
                        echo "<br>";
                        echo "<h1>Su automóvil no se encuentra registrado en la base de datos del estacionamiento.</h1>";
                        echo "<form action='validacionsimulacioni.php' method='POST'>
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
                                                Intentar denuevo
                                            </span>
                                        </button>
                                       </form>";
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