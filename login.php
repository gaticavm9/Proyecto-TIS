<?php
        require("conexion.php");
        session_start();
        if (isset($_POST['rut_jefe'])){      	
      	$rut_jefe = stripslashes($_REQUEST['rut_jefe']); 
      	$rut_jefe = mysqli_real_escape_string($conexion,$rut_jefe); 
      	$contrasena = stripslashes($_REQUEST['contrasena']);
        $contrasena = mysqli_real_escape_string($conexion,$contrasena);  
              	
        
        $query="SELECT * FROM jefe WHERE rut_jefe='$rut_jefe' and contrasena='".md5($contrasena)."'";
      	$result=mysqli_query($conexion,$query) or die(mysql_error());
      	$rows=mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['rut_jefe']=$rut_jefe;
            header("Location: usuario.php");
        }else{
      		header("Location: errorlogin.php");
      	}
        }else{
?>
<?php
}
?>