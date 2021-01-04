<?php
    include("auth.php"); 
    include("barra2.php"); 
    include("menu.php");
?>
<?php 
    require("conexion.php");
    
    $rut_jefe=$_SESSION['rut_jefe'];
    
    $id_personal = $_GET["id_personal"];
    $consulta = "SELECT * FROM trabajador where id_personal = $id_personal";
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
                    <h3>Modificar trabajador:</h3>
                    <br>
                    <form action="ediciontrabajador.php" method="POST">
                    <?php 
                        while($row=mysqli_fetch_array($resultado)){
                            $id_personal = $row["id_personal"];
                            $rut = $row["rut"];
                            $nombre = $row["nombre"];
                            $telefono = $row["telefono"];
                            $direccion = $row["direccion"];
                            $area = $row["area"];
                            $sexo = $row["sexo"];
                            $autorizacion = $row["autorizacion"];
                            $rut_universidad = $row["rut_universidad"];
                            $id_jefe = $row["id_jefe"];
                            echo "
                            <input type='hidden' name='id_personal' value='".$id_personal."'>
                            <input style='width:20%' type='number' min='100000000' max='999999999' step='1' placeholder='rut' name='rut' id='rut' required value='".$rut."'>
                            <input style='width:20%; margin-left:10px' type='text' minlength='3' placeholder='nombre' name='nombre' maxlength='50' required value='".$nombre."'>
                            <input style='width:20%; margin-left:10px' type='number' min='100000000' max='999999999' placeholder='telefono' name='telefono' required value='".$telefono."'>
                            <br>
                            <input style='width:20%; margin-top:5px' type='text' minlength='3' placeholder='direccion' name='direccion' required value='".$direccion."'>
                            
                            <select style='width:20%; margin-left:10px; margin-top:5px' name='area' style='width:180px;height: 21px;' required>
                                    <option value='".$area."'>".$area."</option>
                                    <option value='Docencia'>Docencia</option>
                                    <option value='Apoyo'>Apoyo</option>
                                    <option value='Tecnico'>Tecnico</option>
                                    <option value='Aseo'>Aseo</option>
                                    <option value='Seguridad'>Seguridad</option>
                            </select>            
                            <select style='width:20%; margin-left:10px; margin-top:5px' name='sexo' style='width:180px;height: 21px;' required>
                                    <option value='".$sexo."'>".$sexo."</option>
                                    <option value='Hombre'>Hombre</option>
                                    <option value='Mujer'>Mujer</option>
                                    <option value='Otro'>Otro</option>
                            </select>
                            <br>
                            <select style='width:20%; margin-top:5px' name='autorizacion' style='width:180px;height: 21px;' required>
                                    <option value='".$autorizacion."'>".$autorizacion."</option>                       
                                    <option value='Autorizado'>Autorizado</option>
                                    <option value='Denegado'>Denegado</option>
                            </select>     
                            ";
                        }
                    ?>
                    <select style='width:20%; margin-left:10px; margin-top:5px' name="rut_universidad" style='width:180px;height: 21px;'>
                        <?php 
                            require("conexion.php");
                            $consulta3 = "SELECT * FROM universidad WHERE rut = $rut_universidad";
                            $resultado3 = mysqli_query($conexion, $consulta3);
                        ?>
                            <?php 
                                while($row3=mysqli_fetch_array($resultado3)){
                                    $nombre_universidad = $row3['nombre'];   
                                }?>            
                        <option value="<?php  echo $rut_universidad?>"><?php  echo $nombre_universidad?></option>

                        <?php 
                            require("conexion.php");
                            $consulta2 = "SELECT * FROM universidad";
                            $resultado2 = mysqli_query($conexion, $consulta2);
                        ?>            
                        <?php  foreach ($resultado2 as $opciones): ?>
                        <option value="<?php  echo $opciones['rut']?>"><?php  echo $opciones['nombre']?></option>
                        <?php  endforeach ?>
                    </select>
                    <select style='width:20%; margin-left:10px; margin-top:5px' name="id_jefe" style='width:180px;height: 21px;'>
                        <?php 
                            require("conexion.php");
                            $consulta3 = "SELECT * FROM jefe WHERE id_jefe = $id_jefe";
                            $resultado3 = mysqli_query($conexion, $consulta3);
                        ?>
                            <?php 
                                while($row3=mysqli_fetch_array($resultado3)){
                                    $rut_jefe = $row3['rut_jefe'];
                                    $nombre_jefe = $row3['nombre'];   
                                }?>    
                        <option value="<?php  echo $id_jefe?>"><?php  echo $nombre_jefe?></option>


                        <?php 
                            require("conexion.php");
                            $consulta2 = "SELECT * FROM jefe";
                            $resultado2 = mysqli_query($conexion, $consulta2);
                        ?>
                        <?php  foreach ($resultado2 as $opciones): ?>
                        <option value="<?php  echo $opciones['id_jefe']?>"><?php  echo $opciones['nombre']?></option>
                        <?php  endforeach ?>
                    </select>
                    <br>    
                    <button style='margin-top:5px' type='submit'>Guardar Cambios</button>
                </form>
                    <form action='trabajador.php' method='GET'>
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