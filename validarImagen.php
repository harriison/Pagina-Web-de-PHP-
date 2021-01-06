	
<?php


$imagen = $_FILES['imagen']; 	
$dirTmp = $imagen['tmp_name'];
$nombreImagen = $imagen['name']; 
$extImagen = substr(strrchr($nombreImagen, '.'), 1); 
$contenidoImagen = addslashes(file_get_contents($dirTmp));
$_SESSION['error'] .= $validador->validarImagen($contenidoImagen, $extImagen);
