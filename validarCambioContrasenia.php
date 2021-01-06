<?php
session_start();

include "Validador.php";
include "BD.php";

$_SESSION['error'] = "";

if (empty($_POST["passwordActual"])) {
    $_SESSION['error'] .= "Escriba su contraseña actual <br>";
}

if ($_SESSION['error'] == "") {
    $theWall = new BD();
    if ($theWall->verificaMiContrasenia($_SESSION['usuario'], $_POST["passwordActual"])) {
        if ($_POST["passwordActual"] == $_POST["password1"]) {
            $_SESSION['error'] .= "Debes escribir una contraseña diferente <br>";
        } else {
            $validador = new Validador();
            $_SESSION['error'] .= $validador->validarContrasenia($_POST["password1"], $_POST["password2"]);
        }
    } else {
        $_SESSION['error'] .= "No conincide con su contraseña <br>";
    }
}

if ($_SESSION['error'] == "") {
    $theWall->cambiarContrasenia($_SESSION['usuario'], $_POST["password1"]);
    $_SESSION["exito"] = "Constraseña modificada con éxito.";
}
header('Location: ' . "editarPerfil.php");
