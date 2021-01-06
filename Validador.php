<?php
//include 'BD.php';

class Validador
{

    function __construct()
    {
    }

    function validarNombreApellido($nomApe, $nombreCampo)
    {
        $val = "";
        if (empty($nomApe)) {
            $val .= "Complete el campo " . $nombreCampo . " <br>";
        } else {
            if (!preg_match("/^[A-Za-z ]/", trim($_POST['nombre']))) {
                $val .= "Campo " . $nombreCampo . " invalido: solo se admiten caracteres alfabeticos <br>";
            }
            if (strlen($_POST['nombre']) < 3) {
                $val .= "Debe tener como minimo 3 caracteres <br>";
            }
        }
        return $val;
    }

    function validarNombreUsuario($usuario)
    {
        $val = "";
        if (empty($usuario)) {
            $val .= "Completar el campo usuario <br>";
        } else {
            if (strlen($usuario) < 6) {
                $val .= "El usuario debe tener como minimo 6 caracteres <br>";
            }
            if (!preg_match("/^[A-Za-z0-9]+$/", trim($usuario))) {
                $val .= "El nombre de usuario debe tener caracteres alfanuméricos <br>";
            }
        }
        $theWall = new BD();
        if ($theWall->dameUsuario($usuario)) {
            $val .= "El nombre de usuario ya esta en uso <br>";
        }
        return $val;
    }

    function validarEmail($email)
    {
        $val = "";
        if (empty($email)) {
            $val .= "Completar el campo email <br>";
        } else {
            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/", trim($email))) {
                $val .= "Correo incorrecto <br>";
            }
        }
        return $val;
    }



    function validarContrasenia($pass1, $pass2)
    {
        $val = "";
        if ($pass1 == "") {
            $val .= "Completar campo contraseña <br>";
        } else {
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%#*?&])([A-Za-z\d$@$!%#*?&]|[^ ]){6,}$/", trim($pass1))) {
                $val .= "La contraseña no es válida, debe tener al menos seis caracteres, un digito, al menos una minúscula, al menos una mayúscula y un simbolo ($@$!%*?&) <br>";
            }
            if ($pass2 != $pass1) {
                $val .= "Las contraseñas no coinciden <br>";
            }
        }
        return $val;
    }

    function validarBusqueda($buscar)
    {
        if (preg_match("/[A-Za-z0-9]/", $buscar)) {
            return true;
        } else {
            return false;
        }
    }

    function validarImagen($imagen, $tipoImagen)
    {
        $val = "";
        if (empty($imagen)) {
            $val .= "Debes subir una imagen <br>";
        } else {
            if ($tipoImagen != "jpg" && $tipoImagen != "png" && $tipoImagen != "jpeg" && $tipoImagen != "gif") {
                $val .= "Elige una imagen con formato JPG, JPEG, PNG & GIF. <br>";
            }
        }
        return $val;
    }
}
