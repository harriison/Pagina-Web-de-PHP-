<?php
session_start();
include("BD.php");

$idMio = $_SESSION["id"];
$idOtroUsuario = $_GET["idOtroUsuario"];
$theWall = new BD();
$theWall->seguir($idOtroUsuario, $idMio);
header('Location: ' . $_SERVER['HTTP_REFERER']);
