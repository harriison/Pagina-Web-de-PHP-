<?php
session_start();
include 'BD.php';
include 'Validador.php';

$_SESSION['error'] = "";
if (empty($_POST['usuario'])) {
    $_SESSION['error'] .= "Ingrese usuario <br>";
}
if (empty($_POST['password'])) {
    $_SESSION['error'] .= "Ingrese contraseña <br>";
}

if ($_SESSION['error'] == "") {
    $theWall = new BD();
    $usuario =  trim(strtolower($_POST['usuario']));
    try {
        $theWall->iniciarSesion($usuario, $_POST["password"]);
        header("Location: miMuro.php");
    } catch (Exception $e) {
        header("Location: index.php");
        $_SESSION["error"] .= $e->getMessage();
    }
}
header("Location: index.php");