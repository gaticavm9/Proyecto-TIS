<?php
  include("auth.php"); 
  include("barra2.php"); 
  include("menu.php");
?>
<?php 
    require("conexion.php");
   
    $rut_jefe=$_SESSION['rut_jefe'];
    $consulta = "SELECT * FROM automovil";
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
                        <div style="display:inline">
                            <br><br>
                            <h3>Ingreso de Automoviles:</h3>
                            <br>
                            <form action="ingresarautomovil.php" method="POST">
                                <input style='width:20%' type="text" minlength="6" maxlength="6" placeholder="Patente" name="patente" required >
                                <input style='width:20%; margin-left:15px' type="text" minlength="2" maxlength="15" placeholder="Modelo" name="modelo" required>
                                <br>
                                <input style='width:20%; margin-top:10px' type="text" minlength="2" maxlength="15" placeholder="Marca" name="marca" required>
                                <select style='width:20%; margin-left:15px; margin-top:10px' name="rut" style='width:180px;height: 21px;' required>        
                                    <?php 
                                        require("conexion.php");
                                        $consulta2 = "SELECT * FROM trabajador";
                                        $resultado2 = mysqli_query($conexion, $consulta2);
                                    ?>
                                    <option value="">Trabajador</option>
                                        <?php  
                                            foreach ($resultado2 as $opciones): 
                                        ?>
                                    <option value="<?php  echo $opciones['rut']?>"><?php  echo $opciones['nombre']?></option>
                                        <?php
                                            endforeach
                                        ?>
                                </select>
                                <br><br>
                                <button type=submit>Ingresar Automóvil</button>
                            </form>
                            <br>
                            <h3>Listado de Automóviles:</h3>
                            <br>
                            <table style="width:500px; text-align:center;margin-left:auto; margin-right:auto;">
                                <thead>
                                    <tr>
                                        <th>Patente</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Rut personal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while($row=mysqli_fetch_array($resultado)){
                                        $patente = $row["patente"];
                                        $modelo = $row["modelo"];
                                        $marca = $row["marca"];
                                        $id_automovil = $row["id_automovil"];
                                        $id_personal = $row["id_personal"];
                                        $consulta3 = "SELECT rut FROM trabajador where id_personal='$id_personal'";
                                        $resultado3 = mysqli_query($conexion, $consulta3);
                                        while($row=mysqli_fetch_array($resultado3)){
                                            $rut = $row["rut"];                                    
                                        } 
                                        echo "<tr>";
                                        echo "<td>".$patente."</td>";
                                        echo "<td>".$modelo."</td>";
                                        echo "<td>".$marca."</td>";
                                        echo "<td>".$rut."</td>";
                                    
                                        echo "<td>
                                            <form action='eliminarautomovil.php' method='GET'>
                                            <input type='hidden' name='id_automovil' value='".$id_automovil."'>
                                            <button type='submit' style='float:left;margin-right:5px;'>
                                                <span class='material-icons' style='font-size:20px; color:rgb(178,34,34)'>
                                                    delete
                                                </span>
                                            </button>
                                            </form>
                                            </td>";
                                        echo "<td>
                                        <a href='modificarautomovil.php?id_automovil=$id_automovil'>
                                            <button type='submit'>
                                                <span class='material-icons' style='font-size:20px; color:rgb(178,34,34)'>
                                                    create
                                                </span>       
                                            </button>
                                        </a>
                                        </td>";
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    <?php 
                    echo "
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
                        </form>";
                    ?>
            </div>
        </div>
    </div>
</div>


</body>
</html>