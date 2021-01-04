<?php
  include("auth.php"); 
  include("barra2.php"); 
  include("menu.php");
  include("conexion.php");
  $count1 = $_POST["count1"];
  $count2 = $_POST["count2"];
  $count3 = $_POST["count3"];
  $count4 = $_POST["count4"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="CSS\estilos.css">
  <link rel="stylesheet" href="CSS\layout.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Estacionamiento</title>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>

<div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                <div class="contenedor col-xs-1 col-lg-1">
                    <div style= "padding-left: 10px; padding-right: 10px;">
                    <br>

                    <?php 
                        echo"   
                                <div id='grafico'></div>
                                <body onload='showResults()'>
                                <script>
                                    var parametros = ['Administracion','Historia','Ingenieria','Educacion'];
                                    var valores = [$count1,$count2,$count3,$count4];
                                    function showResults(){
                                    for (var i = 0; i < document.querySelectorAll('.parametro').length ; i++) {
                                    parametros.push(document.querySelectorAll('.parametro')[i].value);
                                    valores.push(parseInt(document.querySelectorAll('.valor')[i].value));
                                    }
                                    var data = [{
                                    x: parametros,
                                    y: valores,
                                    type: 'bar'
                                    }];
                                    var layout = {
                                        title: {
                                          text:'Cantidad de autos estacionados',
                                          font: {
                                            family: 'Courier New, monospace',
                                            size: 24,
                                          },
                                          xref: 'paper',
                                          x: 0.05,
                                        },
                                        xaxis: {
                                          title: {
                                            text: 'Estacionamientos',
                                            font: {
                                              family: 'Courier New, monospace',
                                              size: 18,
                                              color: 'black',
                                            }
                                          },
                                        },
                                        yaxis: {
                                          title: {
                                            text: 'Cantidad',
                                            font: {
                                              family: 'Courier New, monospace',
                                              size: 18,
                                              color: 'black'
                                            }
                                          }
                                        }
                                      };
                                    Plotly.newPlot('grafico',data, layout);
                                    }
                                </script>";
?>               

<form action='contarportiempo.php' method='GET'>
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
    </div>






</body>
</html>