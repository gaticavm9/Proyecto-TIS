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
    <title>Estacionamiento</title>
</head>
<body>



    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
                        <div style="display:inline">
                        <br><br>
                        <h3>Conceder permiso temporal de acceso</h3>
                        <h5>Este permiso es válido solo para un único ingreso al estacionamiento.</h5>
                        <br>
                        <h4>Datos personales</h4><br>
                        <form action="ingresopermisotemporal.php" method="POST">
                                <input style='width:20%' type="text" placeholder="Rut" minlength="8" maxlength="9" name="rut" id="rut" pattern="[0-9,K]{8,9}" title="Ingrese rut sin puntos, ni guión" required>
                                <input style='width:20%; margin-left:10px' type="text" minlength="3" placeholder="Nombre" name="nombre" maxlength="50" required>
                                <input style='width:20%; margin-left:10px' type="text" maxlength="9" placeholder="Teléfono" name="telefono" pattern="[0-9]{9}" title="Ingrese 9 dígitos" required>
                                <input style='width:20%; margin-left:10px' type="text" minlength="3" placeholder="Dirección" name="direccion" required>
                                <br>
                                <input type='hidden' name='area' value='Temporal'>
                                <select style='width:20%; margin-top:5px' name='sexo' style='width:180px;height: 21px;' required>
                                                <option value="">Sexo</option>
                                                <option value='Hombre'>Hombre</option>
                                                <option value='Mujer'>Mujer</option>
                                                <option value='Otro'>Otro</option>
                                </select>
                                <input type='hidden' name='autorizacion' value='Autorizado'>
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
                                                while($row=mysqli_fetch_array($resultado2)){
                                                    $nombre = $_POST["nombre"];
                                                }
                                            ?>
                                                <option value="">Jefe</option>
                                            <?php  foreach ($resultado2 as $opciones): ?>
                                                <option value="<?php  echo $opciones['id_jefe']?>"><?php  echo $opciones['nombre']?></option>
                                            <?php  endforeach ?>
                                </select>

                                <input style='width:20%; margin-left:10px; margin-top:5px' type="email" name="email" placeholder="Email" required>

                                <?php 
                                
                                ?>
                                <br>
                                <br><h4>Datos automóvil</h4><br>
                                <input style='width:20%' type="text" minlength="6" maxlength="6" placeholder="Patente" name="patente" required>
                                <input style='width:20%; margin-left:10px' type="text" minlength="2" maxlength="15" placeholder="Modelo" name="modelo" required>
                                <input style='width:20%; margin-left:10px' type="text" minlength="2" maxlength="15" placeholder="Marca" name="marca" required>
                                <br> <br>
                                <button style='margin-top:5px' type=submit>Conceder Permiso Temporal</button>
                        </form>

                        </div>
                        <?php 
                        echo "
                            <br><br><br>
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