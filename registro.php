
<div class="w-50 p-3 shadow-sm bg-white  mx-auto rounded">

    <form class="ui form" action="validarRegistro.php" enctype="multipart/form-data" name="Register" method="post" id="formulario">
        <!-- onsubmit="return validarRegistro()"-->
        <h2 class="h3 mb-3 font-weight-normal">Crea tu cuenta</h2>
        <p>Es gratis, nos financiamos con tus datos.</p>

        <div class="two fields margenArriba">
            <div class="field">
                <input class="" type="text" placeholder="Nombre" name="nombre">
            </div>
            <div class="field">
                <input class="" type="text" placeholder="Apellido" name="apellido">
            </div>
        </div>
        <div class="two fields">
            <div class="six wide field">
                <input class="" type="text" placeholder="Usuario" name="usuario">
            </div>
            <div class="twelve wide field">
                <input class="" type="text" placeholder="Email" name="email">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <input class="" type="password" placeholder="Contraseña" id="password1" name="password1">
            </div>
            <div class="field">
                <input class="" type="password" placeholder="Repetir Contraseña" id="password2" name="password2">
            </div>
        </div>

        <label class="ui icon button">
            <i class="file image icon"><input class="inputImage" type="file" id="imagen" name="imagen" onchange="return validarImagen()" /></i>
            Foto</label>

        <div class="margenArriba">
            <input type="submit" name="Register" value="Registrar" class="positive ui button">
            <button type="reset" value="Reset" class="negative ui button">Borrar</button>
        </div>
        <div class="margenArriba image-container" id="imagePreview"></div>
    </form>
</div>
