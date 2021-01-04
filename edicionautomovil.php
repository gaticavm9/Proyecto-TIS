<?php
    include("auth.php"); 
?>
<?php 
    require("conexion.php");
    
    $rut_jefe=$_SESSION['rut_jefe'];
    $id_automovil = $_POST["id_automovil"];

    $post = (isset($_POST["patente"]) && !empty($_POST["patente"])) 
            && (isset($_POST["modelo"]) && !empty($_POST["modelo"]))
            && (isset($_POST["marca"]) && !empty($_POST["marca"]))
            && (isset($_POST["rut"]) && !empty($_POST["rut"]))
            ;
    
    if($post)
    {
    $patente = $_POST["patente"];
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $rut = $_POST["rut"];
    
    $consultaaux = "SELECT id_personal FROM trabajador WHERE rut='$rut'";
    $resultado = mysqli_query($conexion, $consultaaux);
    while($row=mysqli_fetch_array($resultado)){
        $id_personal = $row["id_personal"];                                     
    } 

    $update = "UPDATE automovil SET patente ='$patente', modelo='$modelo' , marca='$marca' , id_personal='$id_personal' WHERE id_automovil='$id_automovil'";
    $result = mysqli_query($conexion,$update);

    header("Location: automovil.php");
    
    }else
    {
        header("Location: index.php");    
    }
?>



            