<?php
  include("auth.php"); 
?>
<?php 
    require("conexion.php");
    
    $rut_jefe=$_SESSION['rut_jefe'];
    
    $post = (isset($_POST["patente"]) && !empty($_POST["patente"])) 
            && (isset($_POST["modelo"]) && !empty($_POST["modelo"]))
            && (isset($_POST["marca"]) && !empty($_POST["marca"]))
            && (isset($_POST["rut"]) && !empty($_POST["rut"]))
            ;
    if($post){
        $patente = $_POST["patente"];
        $modelo = $_POST["modelo"];
        $marca = $_POST["marca"];
        $rut = $_POST["rut"];
        

        $consultaaux = "SELECT id_personal FROM trabajador WHERE rut='$rut'";
        $resultado = mysqli_query($conexion, $consultaaux);
        while($row=mysqli_fetch_array($resultado)){
            $id_personal = $row["id_personal"];                                    
        }    

        $insert = "INSERT INTO automovil (patente, modelo, marca, id_automovil, id_personal) VALUES ('$patente', '$modelo','$marca', null, '$id_personal')";
        $resultado = mysqli_query($conexion, $insert);
        header("Location: automovil.php");
    }else{
        header("Location: index.php");    
    }
?>