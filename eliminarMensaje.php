<?php
session_start();
include("BD.php");

$idUsuario = $_SESSION["id"];
$idMensaje = $_GET['idMensaje'];

$theWall = new BD();
$theWall->eliminarMsj($idUsuario, $idMensaje);

header('Location: ' . $_SERVER['HTTP_REFERER']);
