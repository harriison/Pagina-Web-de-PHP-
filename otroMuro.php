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
    $direccion= "otroMuro.php?id=". $_GET["id"]."&";
    if (!empty($_GET["pag"])) {
        $mensajes = $theWall->mensajesPorId($_GET["id"], $_GET['pag']);
    } else {
        $mensajes = $theWall->mensajesPorId($_GET["id"], '0');
    }
    $usuario = $theWall->dameUsuarioPorId($_GET["id"]);
    $nombre = $usuario[2];
    $apellido = $usuario[1];
    $usuarioArroba = $usuario[4];
    $idUsuario = $_GET["id"];
    $soyPropietario = False;
    $loSigo = $theWall->loSigo($idUsuario, $_SESSION["id"]);
    include 'datosPerfil.php';
    $cantTotal = sizeof($mensajes); 
    for ($i = 0; $i < $cantTotal; $i++) {
        $fechaTrino = $mensajes[$i][5];
        $textoTrino = $mensajes[$i][1];
        $tieneImagen = $mensajes[$i][3] != "";
        $idTrino = $mensajes[$i][0];
        $cant = $theWall->cantidadLikesPorMsj($mensajes[$i][0]);
        $diMeGusta = $theWall->leDiLike($mensajes[$i][0], $_SESSION["id"])[0];
        include 'trino.php';
    }
 $cantTotal = $theWall-> cantidadMensajesPorId($_GET["id"]);
    include 'paginacion.php';
    ?>

    <footer>
        Creado por: Harrison Avella
    </footer>

</body>

</html>