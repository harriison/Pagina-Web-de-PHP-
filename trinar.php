<div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded margenArriba">
  <div class="tweet-content  ">
    <div class="tweet-header">
      <span class="fullname">
        <strong><?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?></strong>
      </span>
      <span class="username">@<?php echo $_SESSION["usuario"]; ?></span>
    </div>
    <a>
      <img class=" tweet-card-avatar" src="mostrarImagen.php?id=<?php echo $_SESSION["id"]; ?>&view=1" alt="" />
    </a>
    <form class="centrado" id='formulario' action="validarTrino.php" name="Trino" method="post" enctype="multipart/form-data">
      <!-- onsubmit="return validarTrino()" -->
      <textarea type="text " class="form-control fijo" placeholder="¿Que piensas?" name="mensaje"></textarea><br>
      <label class="ui icon button">
        <i class="file image icon"><input class="inputImage" type="file" id="imagen" name="imagen" onchange="return validarImagen()" /></i>
        Imagen</label>
      <div class="margenArriba">
        <button class="ui button " type="submit">Enviar</button>
      </div>
    </form>
    <div class="margenArriba image-container" id="imagePreview"></div>
  </div>
</div>