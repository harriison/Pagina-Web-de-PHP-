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
  
  include 'errores.php';
  include 'trinar.php';
  $direccion= "miMuro.php?";
  if (!empty($_GET["pag"])) {
    $mensajes = $theWall->mensajesPorId($_SESSION["id"], $_GET['pag']);
  } else {
    $mensajes = $theWall->mensajesPorId($_SESSION["id"], '0');
  }
  $nombre = $_SESSION["nombre"];
  $apellido = $_SESSION["apellido"];
  $usuarioArroba = $_SESSION["usuario"];
  $soyPropietario = True;
  for ($i = 0; $i < sizeof($mensajes); $i++) {
    $fechaTrino = $mensajes[$i][5];
    $idUsuario = $_SESSION["id"];
    $textoTrino = $mensajes[$i][1];
    $tieneImagen = $mensajes[$i][3] != "";
    $idTrino = $mensajes[$i][0];
    $cant = $theWall->cantidadLikesPorMsj($mensajes[$i][0]);
    $diMeGusta = $theWall->leDiLike($mensajes[$i][0], $_SESSION["id"])[0];

    include 'trino.php';
  }
  $cantTotal = $theWall-> cantidadMensajesPorId($_SESSION["id"]);
  include 'paginacion.php';
  ?>

  <footer>
    Creado por: Harrison Avella
  </footer>

</body>

</html>