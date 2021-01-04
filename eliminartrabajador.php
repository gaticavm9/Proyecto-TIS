<?php
  include("auth.php"); 
?>
<?php 
  require("conexion.php");
  $rut_jefe=$_SESSION['rut_jefe'];
  $id_personal = $_GET["id_personal"];
    
  $delete = "DELETE FROM trabajador WHERE (id_personal ='$id_personal')" ;
  $resultado = mysqli_query($conexion, $delete);
  header("Location: trabajador.php");

?>