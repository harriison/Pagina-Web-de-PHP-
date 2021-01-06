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
  ?>

  <div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded">
    <h2 class="h3 mb-3 font-weight-normal">Editar perfil</h2>
    <div class="two fields margenArriba">
      <form action="validarEditarDatos.php" class="ui form" name="editProfile" enctype="multipart/form-data" method="post">
        <!-- onsubmit="return validarEditarPerfil()" -->
        <div class="two fields">
          <div class="field">
            <input class="" type="text" placeholder="Nombre" name="nombre" value="<?php echo $_SESSION["nombre"]; ?>">
          </div>
          <div class="field">
            <input class="" type="text" placeholder="Apellido" name="apellido" value="<?php echo $_SESSION["apellido"]; ?>">
          </div>
        </div>

        <div class="field">
          <input class="" type="email" placeholder="Email" name="email" value="<?php echo $_SESSION["email"]; ?>">
        </div>

    </div>

    <label class="ui icon button">
      <i class="file image icon"><input class="inputImage" type="file" id="imagen" name="imagen" onchange="return validarImagen()" value="<img class=" tweet-card-avatar"/></i>
      Foto</label>

    <div class="margenArriba">
      <input type="submit" value="Editar Perfil" class="positive ui button">
      <button type="reset" value="Reset" class="negative ui button">Borrar</button>
    </div>
    <div class="margenArriba image-container" id="imagePreview"></div>
    </form>
  </div>


  <div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded margenArriba">
    <form action="validarCambioContrasenia.php" class="ui form" name="editPass" method="post">
      <!-- onsubmit="return validarCambioContraseña()" -->
      <h2 class="h3 mb-3 font-weight-normal">Editar contraseña</h2>
      <div class="field">
        <input class="" type="password" placeholder="Contraseña Actual" id="passwordActual" name="passwordActual"><br>
      </div>
      <div class="two fields margenArriba">
        <div class="field">
          <input class="" type="password" placeholder="Nueva Contraseña" id="password1" name="password1"><br>
        </div>
        <div class="field">
          <input class="" type="password" placeholder="Repetir Contraseña" id="password2" name="password2"><br>
        </div>
      </div>
      <div class="">
        <input type="submit" value="Cambiar contraseña" class="positive ui button">
        <button type="reset" value="Reset" class="negative ui button">Borrar</button>
      </div>
    </form>
  </div>

</body>

</html>