<?php
session_start();
include("BD.php");
include("Validador.php");
$_SESSION["error"] ="";
if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
	$validador = new Validador();
	include 'validarImagen.php';
}
if (strlen($_POST["mensaje"]) <= 140) {			
	$theWall = new BD();
	$theWall->trinar($_POST["mensaje"], $_SESSION["id"], $contenidoImagen, $extImagen); 
} else {
	$_SESSION["error"] .= "Mensaje mayor a 140 caracteres. <br>";
}
header("Location: miMuro.php");
