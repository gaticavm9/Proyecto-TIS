<?php
  include("barra.php"); 
  include("menu.php");
  include("conexion.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="Funciones js\funciones.js"></script>
    <title>Estacionamiento UCSC</title>
</head>
<body>

    <div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                <div class="contenedor col-xs-1 col-lg-1">
                    <h1>Estacionamiento UCSC</h1>
                     <div class="visor2">
                         <div class="descripcion" style="text-align:justify">
                            <h4 style="width: 320px;">En el marco de la nueva reglamentación sanitaria sobre el distanciamiento social y la prevención del COVID19,
                                                       La UCSC a través de su Unidad de Infraestructura DO ha implementado un sistema capaz de controlar el acceso 
                                                       vehicular al interior del Campus San Andrés.</h4>
                        <div class="caja">
                           <div class="box">
                              <img src="Imagenes/campus-san-andres.jpg" alt="campus" style='height:200px; margin-top:20px'>
                           </div>
                        </div>
                     </div>
                   
                  
                  </div>
                  <?php
                    $consulta1 = "SELECT * from ingreso WHERE estado='Dentro' and id_estacionamiento='1'";
                    $resultado1 = mysqli_query($conexion, $consulta1);
                    $rows1 = mysqli_num_rows($resultado1);
                    $consulta2 = "SELECT * from ingreso WHERE estado='Dentro' and id_estacionamiento='2'";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    $rows2 = mysqli_num_rows($resultado2);
                    $consulta3 = "SELECT * from ingreso WHERE estado='Dentro' and id_estacionamiento='3'";
                    $resultado3 = mysqli_query($conexion, $consulta3);
                    $rows3 = mysqli_num_rows($resultado3);
                    $consulta4 = "SELECT * from ingreso WHERE estado='Dentro' and id_estacionamiento='4'";
                    $resultado4 = mysqli_query($conexion, $consulta4);
                    $rows4 = mysqli_num_rows($resultado4);

                    $consultac1 = "SELECT capacidad from estacionamiento WHERE ubicacion='Administracion'";
                    $resultadoc1 = mysqli_query($conexion, $consultac1); 
                    while($row=mysqli_fetch_array($resultadoc1)){
                       $capacidad1 = $row["capacidad"];
                    }
                    $consultac2 = "SELECT capacidad from estacionamiento WHERE ubicacion='Historia'";
                    $resultadoc2 = mysqli_query($conexion, $consultac2); 
                    while($row=mysqli_fetch_array($resultadoc2)){
                     $capacidad2 = $row["capacidad"];
                     }
                    $consultac3 = "SELECT capacidad from estacionamiento WHERE ubicacion='Ingenieria'";
                    $resultadoc3 = mysqli_query($conexion, $consultac3); 
                    while($row=mysqli_fetch_array($resultadoc3)){
                     $capacidad3 = $row["capacidad"];
                     }
                    $consultac4 = "SELECT capacidad from estacionamiento WHERE ubicacion='Educacion'";
                    $resultadoc4 = mysqli_query($conexion, $consultac4); 
                    while($row=mysqli_fetch_array($resultadoc4)){
                     $capacidad4 = $row["capacidad"];
                     }

                    $disponibles1= $capacidad1 - $rows1;
                    $disponibles2= $capacidad2 - $rows2;
                    $disponibles3= $capacidad3 - $rows3;
                    $disponibles4= $capacidad4 - $rows4;
                     
                    echo "
                        <div class='visor'>
                        <h3>Espacio disponible en los estacionamientos.</h3>
                        <div class='estacionamiento'>
                        <div class='barraestacionamiento'><h4>Administración</h4></div>
                        <div style='height: 100%;' >
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Disponibles</h5></div>
                           <div class='datosbase' id='1'><span style='font-size:24px'>$disponibles1</span></div>
                        </div>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Ocupados</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$rows1<//span></div>
                        </div>
                        <div class='barradatos2'>
                           <div class='disponibles'><h5>Capacidad</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$capacidad1</span></div>   
                        </div>
                        </div>
                        </div>
         
                        <div class='estacionamiento'>
                        <div class='barraestacionamiento'><h4>Historia</h4></div>
                        <div style='height: 100%;' >
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Disponibles</h5></div>
                           <div class='datosbase' id='2'><span style='font-size:24px'>$disponibles2</span></div>
                        </div>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Ocupados</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$rows2</span></div>
                        </div>
                        <div class='barradatos2'>
                           <div class='disponibles'><h5>Capacidad</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$capacidad2</span></div>  
                        </div>
                        </div>
                        </div>

                        <div class='estacionamiento'>
                        <div class='barraestacionamiento'><h4>Ingeniería</h4></div>
                        <div style='height: 100%;'>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Disponibles</h5></div>
                           <div class='datosbase' id='3'><span style='font-size:24px'>$disponibles3</span></div>
                        </div>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Ocupados</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$rows3</span></div>
                        </div>
                        <div class='barradatos2'>
                           <div class='disponibles'><h5>Capacidad</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$capacidad3</span></div>  
                        </div>
                        </div>
                        </div>

                        <div class='estacionamiento'>
                        <div class='barraestacionamiento'><h4>Educación</h4></div>
                        <div style='height: 100%;'>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Disponibles</h5></div>
                           <div class='datosbase' id='4'><span style='font-size:24px'>$disponibles4</span></div>
                        </div>
                        <div class='barradatos'>
                           <div class='disponibles'><h5>Ocupados</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$rows4</span></div>
                        </div>
                        <div class='barradatos2'>
                           <div class='disponibles'><h5>Capacidad</h5></div>
                           <div class='datosbase'><span style='font-size:24px'>$capacidad4</span></div>
                        </div>
                        </div>
                        </div>
                        </div>";
                     
                  echo "
                  <script>
                          var a = document.getElementById('1');
                          var b = document.getElementById('2');
                          var c = document.getElementById('3');
                          var d = document.getElementById('4');
                          if(($disponibles1 <= ($capacidad1/2))){
                           a.style.backgroundColor = 'yellow';

                           }
                          if(($disponibles1 <= ($capacidad1/4))){
                           a.style.backgroundColor = 'orange';

                           }
                          if(($disponibles1 <= ($capacidad1-($capacidad1-1)))){
                           a.style.backgroundColor = 'red'; 
                           
                           }
                           if(($disponibles2 <= ($capacida2/2))){
                              b.style.backgroundColor = 'yellow';
    
                               }
                           if(($disponibles2 <= ($capacidad2/4))){
                              b.style.backgroundColor = 'orange';
    
                              }
                           if(($disponibles2 <= ($capacidad2-($capacidad2-1)))){
                              b.style.backgroundColor = 'red'; 
                               
                              }
                           if(($disponibles3 <= ($capacidad3/2))){
                              c.style.backgroundColor = 'yellow';
       
                              }
                           if(($disponibles3 <= ($capacidad3/4))){
                              c.style.backgroundColor = 'orange';
       
                              }
                           if(($disponibles3 <= ($capacidad3-($capacidad3-1)))){
                              c.style.backgroundColor = 'red'; 
                                  
                              }
                           if(($disponibles4 <= ($capacidad4/2))){
                              d.style.backgroundColor = 'yellow';
          
                              }
                           if(($disponibles4 <= ($capacidad4/4))){
                              d.style.backgroundColor = 'orange';
          
                              }
                           if(($disponibles4 <= ($capacidad4-($capacidad4-1)))){
                              d.style.backgroundColor = 'red'; 
                                     
                              }
                                     
                  </script>
                  ";
                   ?>   
                </div>
            </div>          
        </div>
    </div>
</body>
</html>