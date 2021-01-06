<?php
session_start();
if (!empty($_SESSION["id"])) { //verifico si el usuario esta logueado puede ver la vista
  header("Location: miMuro.php"); // si no esta logueado lo redirecciona al index
}
include("BD.php");
$theWall = new BD();
?>

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
  include 'navLogin.php';
  include 'errores.php';
  include 'registro.php';
  ?>
  </div>
  <footer>
    Creado por: Harrison Avella
  </footer>
</body>

</html>