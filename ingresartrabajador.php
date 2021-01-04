<?php
  include("auth.php"); 
 ?>
<?php 
    require("conexion.php");
    
    $rut_jefe=$_SESSION['rut_jefe'];
        
    $post = (isset($_POST["rut"]) && !empty($_POST["rut"])) 
            && (isset($_POST["nombre"]) && !empty($_POST["nombre"]))
            && (isset($_POST["telefono"]) && !empty($_POST["telefono"]))
            && (isset($_POST["direccion"]) && !empty($_POST["direccion"]))
            && (isset($_POST["area"]) && !empty($_POST["area"]))
            && (isset($_POST["sexo"]) && !empty($_POST["sexo"]))
            && (isset($_POST["autorizacion"]) && !empty($_POST["autorizacion"]))
            && (isset($_POST["rut_universidad"]) && !empty($_POST["rut_universidad"]))
            && (isset($_POST["id_jefe"]) && !empty($_POST["id_jefe"]))            
            ;

    if($post)
    {
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $area = $_POST["area"];
    $sexo = $_POST["sexo"];
    $autorizacion = $_POST["autorizacion"];
    $rut_universidad = $_POST["rut_universidad"];
    $id_jefe = $_POST["id_jefe"];    

    $insert = "INSERT INTO trabajador (id_personal, rut, nombre, telefono, direccion, area, sexo, autorizacion, rut_universidad, id_jefe) VALUES (null, '$rut', '$nombre','$telefono', '$direccion', '$area', '$sexo', '$autorizacion', '$rut_universidad', '$id_jefe')";
    $resultado = mysqli_query($conexion, $insert);

    header("Location: trabajador.php");

    }else
    {
        header("Location: index.php");    
    }


    ?>