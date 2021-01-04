<?php
  include("barra.php"); 
  include("menu.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="..\CSS\estilos.css">
    <link rel="stylesheet" href="..\CSS\layout.css">
    <title>Estacionamiento</title>
</head>
<body>

<div class="body-wrapper">        
        <div class="row">
            <div class="col-xs-1 col-lg-1">
                    <div class="contenedor col-xs-1 col-lg-1">
						<div class="form">
									<br>
								<h1>Inicia sesión</h1>
								<br>
								<form action="login.php" method="post" name="login">
									<input type="text"  name="rut_jefe" placeholder="Rut" minlength="8" maxlength="9" id="rut" pattern="[0-9,K]{8,9}" title="Ingrese rut sin puntos, ni guión"required />
									<br><br>
									<input type="password" minlength="3" maxlength="35" name="contrasena" placeholder="Contraseña" required />
									<br><br>
									<input name="submit" type="submit" value="Entrar" />
								</form>
								<br><br>
								<form action='index.php' method='GET'>
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