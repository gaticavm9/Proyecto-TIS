<?php
    include("auth.php"); 
    include("barra2.php"); 
    include("menu.php");
?>
<?php 
    require("conexion.php");
    $rut_jefe=$_SESSION['rut_jefe'];
    $consulta = "SELECT * FROM trabajador";
    $resultado = mysqli_query($conexion, $consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="funciones.js"></script>
    <title>Estacionamiento</title>
</head>
<body>



    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
                        <div style="display:inline">
                            <br><br>
                            <h3>Ingreso de trabajadores:</h3>
                            <br>
                            <div class="form">
                                <form action="ingresartrabajador.php" method="POST">
                                        <input style='width:20%' type="text" placeholder="Rut" minlength="8" maxlength="9" name="rut" id="rut" pattern="[0-9,K]{8,9}" title="Ingrese rut sin puntos, ni guión" required>
                                        <input style='width:20%; margin-left:10px' type="text" minlength="3" placeholder="Nombre" name="nombre" maxlength="50" required>
                                        <input style='width:20%; margin-left:10px' type="text" maxlength="9" placeholder="Teléfono" name="telefono" pattern="[0-9]{9}" title="Ingrese 9 dígitos" required>
                                        <br>
                                        <input style='width:20%; margin-top:5px' type="text" minlength="3" placeholder="Dirección" name="direccion" required>
                                        <select style='width:20%; margin-left:10px; margin-top:5px' name='area' style='width:180px;height: 21px;' required>
                                                    <option value="">Area</option>
                                                    <option value='Docencia'>Docencia</option>
                                                    <option value='Apoyo'>Apoyo</option>
                                                    <option value='Tecnico'>Tecnico</option>
                                                    <option value='Aseo'>Aseo</option>
                                                    <option value='Seguridad'>Seguridad</option>
                                        </select>            
                                        <select style='width:20%; margin-left:10px; margin-top:5px' name='sexo' style='width:180px;height: 21px;' required>
                                                    <option value="">Sexo</option>
                                                    <option value='Hombre'>Hombre</option>
                                                    <option value='Mujer'>Mujer</option>
                                                    <option value='Otro'>Otro</option>
                                        </select>
                                        <br>
                                        <select style='width:20%' name='autorizacion' style='width:180px;height: 21px;' required>
                                                    <option value="">Autorizacion</option>                        
                                                    <option value='Autorizado'>Autorizado</option>
                                                    <option value='Denegado'>Denegado</option>
                                        </select>
                                        <select style='width:20%; margin-left:10px; margin-top:5px' name="rut_universidad" style='width:180px;height: 21px;' required>
                                                <?php 
                                                    require("conexion.php");
                                                    $consulta2 = "SELECT * FROM universidad";
                                                    $resultado2 = mysqli_query($conexion, $consulta2);
                                                ?>
                                                    <option value="">Universidad</option>
                                                <?php  foreach ($resultado2 as $opciones): ?>
                                                    <option value="<?php  echo $opciones['rut']?>"><?php  echo $opciones['nombre']?></option>
                                                <?php  endforeach ?>
                                        </select>
                                        <select style='width:20%; margin-left:10px; margin-top:5px' name="id_jefe" style='width:180px;height: 21px;' required>
                                                <?php 
                                                    require("conexion.php");
                                                    $consulta2 = "SELECT * FROM jefe";
                                                    $resultado2 = mysqli_query($conexion, $consulta2);
                                                ?>
                                                    <option value="">Jefe</option>
                                                <?php  foreach ($resultado2 as $opciones): ?>
                                                    <option value="<?php  echo $opciones['id_jefe']?>"><?php  echo $opciones['nombre']?></option>
                                                <?php  endforeach ?>
                                        </select>
                                        <br>
                                        <button style='margin-top:5px'type=submit>Ingresar Trabajador</button>
                                </form>
                            </div>                     

                            <br>
                            <h3>Listado de trabajadores:</h3>
                            <br>

                            <table style="width:500px; font-size: 15px; margin-left:auto; margin-right:auto;">
                                    <thead>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Área</th>
                                            <th>Sexo</th>
                                            <th>Autorización</th>
                                            <th>Rut universidad</th>
                                            <th>Nombre jefe</th>
                                        </tr>
                                    </thead>
                                <tbody>
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
                                        $consulta3 = "SELECT nombre FROM jefe where id_jefe='$id_jefe'";
                                        $resultado3 = mysqli_query($conexion, $consulta3);
                                        while($row=mysqli_fetch_array($resultado3)){
                                            $nombrejefe = $row["nombre"];                                    
                                        } 
                                

                                    echo "<tr>";
                                    echo "<td>".$rut."</td>";
                                    echo "<td>".$nombre."</td>";
                                    echo "<td>".$telefono."</td>";
                                    echo "<td>".$direccion."</td>";
                                    echo "<td>".$area."</td>";
                                    echo "<td>".$sexo."</td>";
                                    echo "<td>".$autorizacion."</td>";
                                    echo "<td>".$rut_universidad."</td>";
                                    echo "<td>".$nombrejefe."</td>";
                                    echo "<td>
                                        <form action='eliminartrabajador.php' method='GET'>
                                        <input type='hidden' name='id_personal' value='".$id_personal."'>
                                        
                                        <button type='submit' style='float:left;margin-right:5px;'>
                                                <span class='material-icons' style='font-size:20px; color:rgb(178,34,34)'>
                                                    delete
                                                </span>
                                        </button>
                                        </form>
                                    </td>";
                                    echo "<td>
                                    <a href='modificartrabajador.php?id_personal=$id_personal'>
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

