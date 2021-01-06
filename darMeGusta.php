<?php
session_start();
include("BD.php");

$idUsuario = $_SESSION["id"];
$idMensaje = $_GET['idMensaje'];
$mg = $_GET['mg'];

$theWall = new BD();

if ($mg == 0) {
  $theWall->like($idUsuario, $idMensaje);
} else {
  $theWall->disLike($idUsuario, $idMensaje);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);