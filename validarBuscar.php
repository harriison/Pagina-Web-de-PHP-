<?php
session_start();
include "Validador.php";

$validador = new Validador();
if ($validador->validarBusqueda($_POST["buscar"])) {
  $_SESSION["busqueda"] = $_POST["buscar"];
  header("Location: busqueda.php");
} else {
  $_SESSION["error"] = "Hay un error en su consulta. <br>";
  $_SESSION["busqueda"] = " ";
  if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    header("Location: miMuro.php");
  }
}
