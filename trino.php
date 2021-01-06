<div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded margenArriba">
    <div class="tweet-content  ">
        <div class="tweet-header margenArriba">
            <span class="fullname">
                <strong><?php echo $nombre . " " . $apellido; ?></strong>
            </span>
            <span class="username">@<?php echo $usuarioArroba; ?></span>
            <span class="card-text"><small class="text-muted"><i class="calendar alternate outline icon"></i><?php echo $fechaTrino . "."; ?></small></span>
        </div>
        <a>
            <img class=" tweet-card-avatar" src="mostrarImagen.php?id=<?php echo $idUsuario; ?>&view=1" alt="">
        </a>
        <div class="tweet-text ">
            <p class="" lang="es" data-aria-label-part="0"> <?php echo $textoTrino; ?>
            </p>
        </div>
        <div class="tweet-text margenArriba">
            <?php
            if ($tieneImagen) {
                echo "<img src='mostrarImagen.php?id=" . $idTrino . "&view=0' class='card-img rounded'/>";
            }
            ?>
        </div>
        <div class="tweet-footer margenArriba">
            <?php  
            if ($diMeGusta) {
                echo "<a class='ui red button' href='darMeGusta.php?idMensaje=" . $idTrino . "&mg=1'><i class='heart icon '></i>" . $cant[0][0] . "</a>";
            } else {
                echo "<a class='ui teal button' href='darMeGusta.php?idMensaje=" . $idTrino . "&mg=0'><i class='heart icon'></i>" . $cant[0][0] . "</a>";
            }
            if ($soyPropietario) {
                echo "<a class='ui button black' href='eliminarMensaje.php?idMensaje=" . $idTrino . "'><i class='trash icon'></i>Borrar</a>";
            }
            ?>
        </div>
    </div>
</div>