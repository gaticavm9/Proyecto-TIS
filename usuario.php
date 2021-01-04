<?php
    include("auth.php"); 
    include("barra2.php"); 
    include("menu.php");
?>
<?php 
    require("conexion.php");
    

    $rut_jefe=$_SESSION['rut_jefe'];
    
    $consulta = "SELECT * FROM jefe WHERE rut_jefe='$rut_jefe'";
    $resultado = mysqli_query($conexion, $consulta);
    while($row=mysqli_fetch_array($resultado)){
        $nombre = $row["nombre"];                                    
    }  

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

                    echo "<div style='display:inline'>
                    <br><br><br><br>
                    <h1>Estacionamiento UCSC</h1>
                    <br><br>

                        <p>Bienvenid@ <b> $nombre </b></p>
                        <p>Acabas de iniciar sesión.</p>
                        <br><br>   
                        

                    <div  style='display:inline-flex'>    
                        <form action='automovil.php' method='GET'>
                            <button class='boton' type='submit' style='background-color:red; 
                                                                    border:none; color:white; 
                                                                    padding:10px; 
                                                                    text-align:center; 
                                                                    font-size:16px;
                                                                    width:280px;
                                                                    height:60px;
                                                                    margin-top:10px;
                                                                    '
                                                                    >
                                <div style='display:inline-block;'>
                                    <span style=''>
                                        Automóviles   
                                    </span>
                                </div>
                                <div style='display:inline-flex;vertical-align:middle !important;'>
                                    <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                        directions_car
                                    </span>
                                </div>
                            </button>
                        </form>    

                        <form action='trabajador.php' method='GET'>
                            <button class='boton' type='submit' style='background-color:red; 
                                                                    border:none; color:white; 
                                                                    padding:10px; 
                                                                    text-align:center; 
                                                                    font-size:16px;
                                                                    width:280px;
                                                                    height:60px;
                                                                    margin-top:10px;
                                                                    margin-left:15px;
                                                                    '
                                                                    >
                                <div style='display:inline-block;'>
                                    <span style=''>
                                        Trabajadores   
                                    </span>
                                </div>
                                <div style='display:inline-flex;vertical-align:middle !important;'>
                                    <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                        supervisor_account
                                    </span>
                                </div>
                            </button>
                        </form>
                    </div>


                    <div  style='display:inline-flex'>  
                    <form action='listarhoras.php' method='GET'>
                        <button class='boton' type='submit' style='background-color:red; 
                                                                border:none; color:white; 
                                                                padding:10px; 
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:16px;
                                                                width:280px;
                                                                height:60px;
                                                                margin-top:10px;
                                                                '
                                                                >
                            <div style='display:inline-block;'>
                                <span style=''>
                                    Registros por automóvil
                                </span>
                            </div>
                            <div style='display:inline-flex;vertical-align:middle !important;'>
                                <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                    description
                                </span>
                            </div>
                        </button>
                    </form>

                    <form action='listarautosestacionamiento.php' method='GET'>
                        <button class='boton' type='submit' style='background-color:red; 
                                                                border:none; color:white; 
                                                                padding:10px; 
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:16px;
                                                                width:280px;
                                                                height:60px;
                                                                margin-top:10px;
                                                                margin-left:15px;'
                                                                >
                            <div style='display:inline-block;'>
                                <span style=''>
                                    Registros por estacionamiento 
                                </span>
                            </div>
                            <div style='display:inline-flex;vertical-align:middle !important;'>
                                <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                    description
                                </span>
                            </div>
                        </button>
                    </form>
                    </div>  

                    <div  style='display:inline-flex'>  
                    <form action='contarportiempo.php' method='GET'>
                        <button class='boton' type='submit' style='background-color:red; 
                                                                border:none; color:white; 
                                                                padding:10px; 
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:16px;
                                                                width:280px;
                                                                height:60px;
                                                                margin-top:10px'
                                                                >
                            <div style='display:inline-block;'>
                                <span style=''>
                                    Registros por periodo de tiempo 
                                </span>
                            </div>
                            <div style='display:inline-flex;vertical-align:middle !important;'>
                                <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                    description
                                </span>
                            </div>
                        </button>
                    </form>
                    <form action='permisotemporal.php' method='GET'>
                        <button class='boton' type='submit' style='background-color:red; 
                                                                border:none; color:white; 
                                                                padding:10px; 
                                                                text-align:center; 
                                                                display:inline-block;
                                                                font-size:16px;
                                                                width:280px;
                                                                height:60px;
                                                                margin-top:10px;
                                                                margin-left:15px;'
                                                                >
                            <div style='display:inline-block;'>
                                <span style=''>
                                    Otorgar permisos temporales 
                                </span>
                            </div>
                            <div style='display:inline-flex;vertical-align:middle !important;'>
                                <span class='material-icons' style='vertical-align:middle !important; padding-bottom:5px'>
                                    query_builder
                                </span>
                            </div>
                        </button>
                    </form>
                    </div>  
                    </div>";

                    ?>
                </div>
            </div>
        </div>
</div>

</body>
</html>