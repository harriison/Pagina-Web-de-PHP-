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
  $direccion = "actualizaciones.php?";
  if (!empty($_GET["pag"])) {
    $mensajes = $theWall->mensajesDeQuienSigo($_SESSION["id"], $_GET['pag']);
  } else {
    $mensajes = $theWall->mensajesDeQuienSigo($_SESSION["id"], '0');
  }
  for ($i = 0; $i < sizeof($mensajes); $i++) {
    $usuario = $theWall->dameUsuarioPorId($mensajes[$i][4]);
    $nombre = $usuario[2];
    $apellido = $usuario[1];
    $usuarioArroba = $usuario[4];
    $fechaTrino = $mensajes[$i][5];
    $idUsuario = $usuario[0];
    $textoTrino = $mensajes[$i][1];
    $tieneImagen = $mensajes[$i][3] != "";
    $idTrino = $mensajes[$i][0];
    $cant = $theWall->cantidadLikesPorMsj($mensajes[$i][0]);
    $diMeGusta = $theWall->leDiLike($mensajes[$i][0], $_SESSION["id"])[0];
    $soyPropietario = False;

    include 'trino.php';
  }
  $cantTotal = $theWall->cantidadMensajesDeQuienSigo($_SESSION["id"]); 
  include 'paginacion.php';
  ?>
  <footer> Creado por: Harrison Avella</footer>
</body>

</html>