<?php
include("BD.php");
$id = $_GET['id'];
$view = $_GET['view'];
$bd = new BD();
if ($view == '0') {
    $result = $bd->mostrarImagenMensaje($id);
} else {
    $result = $bd->mostrarImagenUsuario($id);
}
header("Content-Type: image/" . $result[1]);
echo $result[0];
