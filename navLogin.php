<nav>
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="elmuro.php" class="header item">
        <img class="logo" src="images/muro.png">
        The WALL: una nueva red social
      </a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      </ul>
      <div class="field">
        <a class="nav-link disabled" href="#">¿Ya estas registrado?</a>
      </div>
      <form class="form-inline my-2 my-lg-0" action="validarIniciarSesion.php" name="Login" method="post">
        <!-- onsubmit="return validarLogin()" -->
        <div class="field">
          <div class="ui left icon input">
            <input class="form-control mr-sm-2" type="text" placeholder="Usuario" name="usuario" id="usuario">
            <i class="user icon"></i>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <input class="form-control mr-sm-2" type="password" placeholder="Contraseña" id="password" name="password">
            <i class="lock icon"></i>
          </div>
        </div>
        <div class="field">
          <input class="ui green button" type="submit" name="login" value="Ingresar">
        </div>
      </form>
    </div>
  </div>
</nav>