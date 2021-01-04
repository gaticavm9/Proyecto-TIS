<?php
    include("auth.php"); 
    include("barra2.php");
    include("menu.php");
?>
<?php 
    require("conexion.php");
    
    $rut_jefe=$_SESSION['rut_jefe'];
    $id_automovil = $_GET["id_automovil"];
    $consulta = "SELECT * FROM automovil WHERE id_automovil=$id_automovil";
    $result = mysqli_query($conexion,$consulta);
    $consulta2 = "SELECT * FROM trabajador";
    $resultado2 = mysqli_query($conexion, $consulta2);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estacionamiento</title>
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
</head>



    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
                        <br><br>
                        <h3>Modificar automóvil:</h3>
                        <br>
                        <form action="edicionautomovil.php" method="POST">
                            <?php
                                while($row=mysqli_fetch_array($result)){
                                    $patente = $row["patente"];
                                    $modelo = $row["modelo"];
                                    $marca = $row["marca"];
                                    $id_automovil = $row["id_automovil"];
                                    $id_personal = $row["id_personal"];

                                    echo "<br><br>
                                    <input style='width:20%' type='text' minlength='6' maxlength='6' placeholder='patente' name='patente' required value='".$patente."'>
                                    <input style='width:20%; margin-left:10px' type='text' minlength='2' maxlength='15' placeholder='modelo' name='modelo' required value='".$modelo."'>
                                    <br>
                                    <input style='width:20%; margin-top:10px' type='text' minlength='2' maxlength='15' placeholder='marca' name='marca' required value='".$marca."'>
                                    <input type='hidden' placeholder='id_automovil' name='id_automovil' value='".$id_automovil."'>";
                                }
                            ?>
                                <select style='width:20%; margin-left:10px; margin-top:10px' name="rut" style='width:180px;height: 21px;' required>           
                                    <?php 
                                        require("conexion.php");
                                        $consulta3 = "SELECT * FROM trabajador WHERE id_personal = $id_personal";
                                        $resultado3 = mysqli_query($conexion, $consulta3);
                                    ?>
                                    <?php 
                                        while($row3=mysqli_fetch_array($resultado3)){
                                            $nombre = $row3['nombre'];
                                            $rut = $row3['rut'];    
                                        }
                                    ?>  
                                    <option value="<?php  echo $rut?>"><?php  echo $nombre?></option>
                                    <?php 
                                        require("conexion.php");
                                        $consulta2 = "SELECT * FROM trabajador";
                                        $resultado2 = mysqli_query($conexion, $consulta2);
                                    ?>
                                    <?php  foreach ($resultado2 as $opciones): ?>
                                        <option value="<?php  echo $opciones['rut']?>"><?php  echo $opciones['nombre']?></option>
                                    <?php  endforeach ?>
                                
                                </select>

                                <br>
                                <button style='margin-top:10px'type="submit">Guardar cambios </button>        
                        </form>
                        <br><br>
                        <form action='automovil.php' method='GET'>
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
</body>
</html>