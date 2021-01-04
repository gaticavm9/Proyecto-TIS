<?php
  include("auth.php"); 
  date_default_timezone_set('America/Santiago');
  $fecha_actual = date("Y-m-d H:i:s");
 
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
            && (isset($_POST["email"]) && !empty($_POST["email"]))   
            && (isset($_POST["patente"]) && !empty($_POST["patente"]))
            && (isset($_POST["modelo"]) && !empty($_POST["modelo"]))
            && (isset($_POST["marca"]) && !empty($_POST["marca"]))
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
    $email= $_POST["email"];
    $asunto= "Permiso Temporal Acceso a UCSC";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $patente = $_POST["patente"];
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];

    $insert = "INSERT INTO trabajador (id_personal, rut, nombre, telefono, direccion, area, sexo, autorizacion, rut_universidad, id_jefe) VALUES (null, '$rut', '$nombre','$telefono', '$direccion', '$area', '$sexo', '$autorizacion', '$rut_universidad', '$id_jefe')";
    $resultado = mysqli_query($conexion, $insert);

    $consultaaux = "SELECT id_personal FROM trabajador WHERE rut='$rut'";
    $resultado = mysqli_query($conexion, $consultaaux);
    while($row=mysqli_fetch_array($resultado)){
        $id_personal = $row["id_personal"];                                    
    }      

    $insert = "INSERT INTO automovil (patente, modelo, marca, id_automovil, id_personal) VALUES ('$patente', '$modelo','$marca', null, '$id_personal')";
    $resultado = mysqli_query($conexion, $insert);
    
    $mensaje="
    <html>
    <head>
    <title>PERMISO</title>
    </head>
    <body>
    <h3>Sr. (a) $nombre:</h3>
    <p>Por este medio confirmamos que se le ha asignado un PERMISO TEMPORAL de acceso a la UCSC con éxito.<br>
    El permiso fue generado el <b>$fecha_actual</b>, el permiso le permite un <b>único acceso</b> al estacionamiento.<br>
    El PERMISO TEMPORAL esta asociado al automóvil con patente: $patente.<br>
    Consulta el estado de tu permiso en Estacionamiento UCSC.<br><br>

    Atentamente,<br>
    Estacionamiento UCSC.
    </p>
    </body>
    </html>
    ";    

    mail($email,$asunto,$mensaje,$headers); 

    header("Location: permisotemporalok.php");

    }else
    {
        header("Location: index.php");    
    }


?>




