<html>

<head>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/validations.js"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    $usuarios = $theWall->buscar($_SESSION["busqueda"]);
    for ($i = 0; $i < sizeof($usuarios); $i++) {
        $idUsuario = $usuarios[$i][0];
        $loSigo = $theWall->loSigo($idUsuario, $_SESSION["id"]);
        $nombre = $usuarios[$i][2];
        $apellido = $usuarios[$i][1];
        $usuarioArroba = $usuarios[$i][4];
        include 'datosPerfil.php';
    }
    ?>
    <footer> Creado por: Harrison Avella</footer>
</body>

</html>