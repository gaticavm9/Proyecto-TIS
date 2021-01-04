<?php
    include("auth.php"); 
?>
<?php 
    require("conexion.php");
    $rut_jefe=$_SESSION['rut_jefe'];
    $id_personal = $_POST["id_personal"];
    
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


    if($post){
        $rut = $_POST["rut"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $area = $_POST["area"];
        $sexo = $_POST["sexo"];
        $autorizacion = $_POST["autorizacion"];
        $rut_universidad = $_POST["rut_universidad"];
        $id_jefe = $_POST["id_jefe"];

        echo "<td>".$id_personal."</td>";
        echo "<td>".$rut."</td>";
        echo "<td>".$nombre."</td>";
        echo "<td>".$telefono."</td>";
        echo "<td>".$direccion."</td>";
        echo "<td>".$area."</td>";
        echo "<td>".$sexo."</td>";
        echo "<td>".$autorizacion."</td>";
        echo "<td>".$rut_universidad."</td>";
        echo "<td>".$id_jefe."</td>";

        $update = "UPDATE trabajador SET rut ='$rut', nombre='$nombre' , telefono='$telefono' , direccion='$direccion' , area='$area' , sexo='$sexo' , autorizacion='$autorizacion' , rut_universidad='$rut_universidad' , id_jefe='$id_jefe'  WHERE id_personal='$id_personal'";
        $resultado = mysqli_query($conexion, $update);
        header("Location: trabajador.php");
    }else{
        header("Location: index.php");    
    }
?>