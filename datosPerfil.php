<div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded margenArriba">
        <div class="ui grid">
            <div class="content margenArriba">
                <img src="mostrarImagen.php?id=<?php echo $idUsuario; ?>&view=1" width="200" height="200" /></br></br>
            </div>
            <div class="metadata margenArriba">
                <div class="author negrita">
                    <?php echo $nombre . " " . $apellido; ?>
                </div>
                <a href="otroMuro.php?id=<?php echo $idUsuario; ?>" class="author">@<?php echo $usuarioArroba; ?></a>
                <?php
                if ($loSigo) {
                    echo "<div class='nine wide column margenArriba'>
        <a class='big ui negative basic button' href='dejarDeSeguir.php?idOtroUsuario=" . $idUsuario . "'>
        <i class='icon user'></i>Dejar de seguir</a></div>";
                } else {
                    echo "<div class='nine wide column margenArriba'>
        <a class='big ui positive basic button' href='seguir.php?idOtroUsuario=" . $idUsuario . "'>
        <i class='icon user'></i>Seguir</a></div>";
                }
                ?>
            </div>
        </div>
    </div>