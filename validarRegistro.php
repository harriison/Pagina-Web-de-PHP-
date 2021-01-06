<?php
session_start();
include "Validador.php";
include "BD.php";
$_SESSION['error'] = "";
$validador = new Validador();
$_SESSION['error'] .= $validador->validarNombreApellido($_POST["nombre"], "nombre");
$_SESSION['error'] .= $validador->validarNombreApellido($_POST["apellido"], "apellido");
$_SESSION['error'] .= $validador->validarEmail($_POST["email"]);
$_SESSION['error'] .= $validador->validarNombreUsuario($_POST["usuario"]);
$_SESSION['error'] .= $validador->validarContrasenia($_POST['password1'], $_POST['password2']);

include 'validarImagen.php';

if ($_SESSION['error'] == "") {
    $theWall = new BD();
    $theWall->nuevoUsuario($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["usuario"], $_POST["password1"],  $contenidoImagen , $extImagen);
    $_SESSION['exito'] = "Usuario registrado <br> Puedes iniciar sesion <br>";
}
header("Location: index.php");
