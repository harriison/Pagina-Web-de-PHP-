<?php
session_start();
if (empty($_SESSION["id"])) {
  header('Location: ' . "index.php");
}
include("BD.php");
$theWall= new BD();
?>

<nav class="navigation">
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="index.php" class="header item">
        <img class="logo  " src="images/muro.png">
        The WALL: una nueva red social
      </a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      </ul>
      <div class="item">
        <form class="ui icon input" action="validarBuscar.php" method="post">
          <input type="text"  name="buscar" placeholder="Buscar...">
          <button class="ui button black" type="submit" id="b_submit" value="Buscar"><i class="search link icon"></i></button>
        </form>
      </div>
      <div class="ui simple dropdown item ">
        <img class="logo rounded-circle" src="mostrarImagen.php?id=<?php echo $_SESSION["id"]; ?>&view=1" />
        <?php echo $_SESSION["usuario"]; ?> <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="miMuro.php">Mi muro</a>
          <a class="item" href="seguidos.php">Seguidos</a>
          <a class="item" href="actualizaciones.php">Actualizaciones</a>
          <a class="item" href="editarperfil.php">Editar perfil</a>
          <a class="item" href="salir.php">Salir</a>
        </div>
      </div>
    </div>
  </div>
</nav>
