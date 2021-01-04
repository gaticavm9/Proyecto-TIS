<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\estilos.css">
    <link rel="stylesheet" href="CSS\layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="Funciones js\funciones.js"></script>
    <title>Estacionamiento</title>
</head>
<body>
    <nav class="nav">
        <a href="index.php" style="text-decoration: None; color: white;">
            <button class='boton' type='submit' style='border:none; background:none; margin-top:10px; outline:none'>
                <span class="nav-brand">
                    <img src="Imagenes/logo_horizontal_color_sinfondo.png" alt="ucsc" style="width: 150px;">                        
                </span>
            </button>
        </a>
        <ol class="nav-links">
            <li style="font-weight: bold; font-size: 20px;">
                <a href="index.php" style="text-decoration: None; color: white;">
                    <button class='boton' type='submit' style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:110px;
                                                '
                                                >
                        <span>
                            Inicio
                        </span>
                    </button>
                </a>
            </li>
            <li style="font-weight: bold; font-size: 20px;">
                <a href="https://www.ucsc.cl" target="_blank" style="text-decoration: None; color: white;">
                    <button class='boton' type='submit' style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:110px;
                                                '
                                                >
                        <span>
                            UCSC
                        </span>
                    </button>
                </a>
            </li>
            <li style="font-weight: bold; font-size: 20px;">
                <a href="patenteconsulta.php" style="text-decoration: None; color: white;">
                    <button class='boton' type='submit' style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:155px;
                                                '
                                                >
                        <span>
                            Consultar permiso
                        </span>
                    </button>
                </a>
            </li>
            <li style="font-weight: bold; font-size: 20px;">
                <a href="ubicacion.php" style="text-decoration: None; color: white;">
                    <button class='boton' type='submit' style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:110px;
                                                '
                                                >
                        <span>
                            Ubicación
                        </span>
                    </button>
                </a>     
            </li>
            <li style="font-weight: bold; font-size: 20px;">
                <a href="consultar.php" style="text-decoration: None; color: white;">
                    <button class='boton' type='submit' style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:150px;
                                                '
                                                >
                        <span>
                            Entrada automóvil
                        </span>
                    </button>
                </a>
            </li>
            <li style="font-weight: bold; font-size: 20px;">
                <form action='logout.php' method='POST'>
                    <button class='boton' type='submit' style='background-color:rgb(178,34,34); 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                display:inline-block;
                                                font-size:16px;
                                                width:130px;
                                                '
                                                >
                        <span>
                            Cerrar sesión
                        </span>
                    </button>
                </form>
            </li>
        </ol>
        <button class='menunav' type='button' value='Menu' onclick="mostrar_animado();" style='background-color:red; 
                                                border:none; color:white; 
                                                padding:10px; 
                                                text-align:center; 
                                                font-size:16px;
                                                width:110px;
                                                '
                                                >
            <span class="material-icons">
                list
            </span>
        </button>
    </nav>
</body>
</html>