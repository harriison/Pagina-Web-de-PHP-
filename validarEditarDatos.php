<?php
session_start();

include 'Validador.php';
include 'BD.php';

$_SESSION['error'] = "";
$_SESSION['exito'] = "";
$validador = new Validador();

$_SESSION['error'] .= $validador->validarNombreApellido($_POST["nombre"], "nombre");
$_SESSION['error'] .= $validador->validarNombreApellido($_POST["apellido"], "apellido");
$_SESSION['error'] .= $validador->validarEmail($_POST["email"]);

if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
    include 'validarImagen.php';
    if ($_SESSION['error'] == "") {
        $theWall = new BD();
        $theWall->cambiarDatos($_POST["nombre"], $_POST["apellido"], $_POST["email"], $contenidoImagen, $extImagen, $_SESSION["id"]);
        $_SESSION['exito'] = "Cambio realizado con exito. <br>";
    }
} else if ($_SESSION['error'] == "") {
    $theWall = new BD();
    $theWall->cambiarDatosSinImagen($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_SESSION["id"]);
    $_SESSION['exito'] = "Cambio realizado con exito. <br>";
}

if ($_SESSION['exito'] != "") {
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["apellido"] = $_POST["apellido"];
    $_SESSION["mail"] = $_POST["mail"];
}

header("Location: editarPerfil.php");
