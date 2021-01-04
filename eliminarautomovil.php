<?php
  include("auth.php"); 
?>

<?php 
  require("conexion.php");
  $id_automovil = $_GET["id_automovil"];
  $delete = "DELETE FROM automovil WHERE (id_automovil ='$id_automovil')" ;
  $resultado = mysqli_query($conexion, $delete);
  header("Location: automovil.php");
?>