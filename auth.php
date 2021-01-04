<?php
    session_start();
    if(!isset($_SESSION["rut_jefe"]) && !isset($_SESSION["contrasena"])){
        header("Location: index.php");
        exit();
    }
?>