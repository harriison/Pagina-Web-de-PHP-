<?php
class BD
{
    protected $conn;

    function __construct()
    {
        $this->conectar();
    }

    public function conectar()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=thewall', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET CHARACTER SET utf8mb4");
            return $this->conn;
        } catch (Exception $e) {
            echo "Ups!!! Error " . $e->getLine() . ".";
        }
        exit('</br>Error al intentar conectar a la base de datos, llame a su proveedor local: 01-8000-THEWALL.');
    }

    function iniciarSesion($usuario, $password)
    {
        if ($yo = $this->conn->query("SELECT * FROM usuarios WHERE nombreusuario = '$usuario' AND contrasenia = '$password'")->fetch()) {
            $_SESSION["usuario"] = $yo[4];
            $_SESSION["id"] = $yo[0];
            $_SESSION["nombre"] = $yo[2];
            $_SESSION["apellido"] = $yo[1];
            $_SESSION["email"] = $yo[3];
        }else throw new Exception('Usuario, contraseña incorrectos o pudo ocurrir otro error.');
    }

    function dameUsuario($usuario)
    {
        $query = $this->conn->query("SELECT nombreusuario FROM usuarios WHERE nombreusuario='" . $usuario . "'");
        return $query->fetch();
    }

    function verificaMiContrasenia($usuario, $password)
    {
        $query = $this->conn->query("SELECT contrasenia FROM usuarios WHERE nombreusuario='" . $usuario . "'");
        return $password == $query->fetch()[0];
    }

    function cambiarContrasenia($usuario, $nueva)
    {
        $this->conn->query("UPDATE usuarios SET contrasenia='$nueva' WHERE nombreusuario='$usuario'");
    }

    function cambiarDatos($nombre, $apellido, $email, $contenidoImagen, $tipoImagen, $idUsuario)
    {
        $this->conn->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email= '$email', foto_contenido= '$contenidoImagen', foto_tipo= '$tipoImagen' WHERE id='$idUsuario'");
    }

    function cambiarDatosSinImagen($nombre, $apellido, $email, $idUsuario)
    {
        $this->conn->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email= '$email' WHERE id='$idUsuario'");
    }

    function dameUsuarioPorId($id)
    {
        $query = $this->conn->query("SELECT * FROM usuarios WHERE id='" . $id . "'");
        return $query->fetch();
    }

    function nuevoUsuario($nombre, $apellido, $email, $usuario, $pass, $imagen, $tipo_imagen)
    {
        $this->conn->query("INSERT INTO usuarios(apellido,nombre,email,nombreusuario,contrasenia,foto_contenido,foto_tipo) VALUES ('$apellido','$nombre','$email','$usuario','$pass','$imagen','$tipo_imagen')");
    }

    function buscar($buscar)
    {
        $query = $this->conn->query("SELECT id, nombre, apellido, email, nombreusuario
        FROM usuarios WHERE (nombreusuario != '" . $_SESSION["usuario"] . "') AND ((nombreusuario LIKE '%" . $buscar . "%')
        OR (nombre LIKE '%" . $buscar . "%') OR (apellido LIKE '%" . $buscar . "%'))");
        return $query->fetchAll();
    }

    function loSigo($idOtroUsuario, $idMio)
    {
        $query = $this->conn->query("SELECT count(*) FROM siguiendo WHERE usuarios_id = $idMio AND usuarioseguido_id = $idOtroUsuario");
        return $query->fetch()[0];
    }

    function seguir($idOtroUsuario, $idMio)
    {
        $this->conn->query("INSERT INTO siguiendo (usuarios_id, usuarioseguido_id) VALUES ($idMio, $idOtroUsuario)");
    }

    function dejarDeSeguir($idOtroUsuario, $idMio)
    {
        $this->conn->query("DELETE FROM siguiendo WHERE usuarios_id = $idMio AND usuarioseguido_id = $idOtroUsuario");
    }

    function trinar($mensaje, $idUsuario, $imagen, $tipo_imagen)
    {
        $date = date('Y-m-d H:i:s'); //Falta cuadrar el horario de publicacion porque me da otro
        $this->conn->query("INSERT INTO mensaje (texto,imagen_contenido,imagen_tipo,usuarios_id,fechayhora)VALUES('$mensaje', '$imagen','$tipo_imagen',$idUsuario,'$date')");
    }

    function mostrarImagenUsuario($id)
    {
        $query = $this->conn->query("SELECT foto_contenido, foto_tipo FROM usuarios WHERE id='" . $id . "'");
        return $query->fetch();
    }

    function mostrarImagenMensaje($id)
    {
        $query = $this->conn->query("SELECT imagen_contenido, imagen_tipo FROM mensaje WHERE id='" . $id . "'");
        return $query->fetch();
    }

    function cantidadMensajesDeQuienSigo($id)
    {
        $query = $this->conn->query("SELECT count(*) from `siguiendo` as sig INNER join `mensaje` as msj on msj.usuarios_id = sig.usuarioseguido_id INNER JOIN `usuarios`as us on us.id=sig.usuarios_id WHERE us.id=$id");
        return $query->fetchColumn();
    }

    function cantidadMensajesPorId($id)
    {
        $query = $this->conn->query("SELECT count(*) from mensaje as msj where msj.usuarios_id =$id");
        return $query->fetchColumn();
    }

    function mensajesDeQuienSigo($id, $limitStart)
    {
        $cuantosVeo = 10;
        $limitStart = $limitStart * $cuantosVeo;
        $query = $this->conn->query("SELECT msj.* from `siguiendo` as sig INNER join `mensaje` as msj on msj.usuarios_id = sig.usuarioseguido_id INNER JOIN `usuarios`as us on us.id=sig.usuarios_id WHERE us.id=$id ORDER by id desc limit $cuantosVeo OFFSET $limitStart");
        return $query->fetchAll();
    }

    function mensajesPorId($id, $limitStart)
    {
        $cuantosVeo = 10;
        $limitStart = $limitStart * $cuantosVeo;
        $query = $this->conn->query("SELECT * FROM mensaje WHERE usuarios_id=$id ORDER BY id DESC limit $cuantosVeo OFFSET $limitStart");
        return $query->fetchAll();
    }

    function eliminarMsj($idUsuario, $idMensaje)
    {
        $this->conn->query("DELETE me_gusta.* FROM me_gusta INNER JOIN mensaje on me_gusta.mensaje_id=mensaje.id WHERE me_gusta.mensaje_id=$idMensaje and mensaje.usuarios_id=$idUsuario");
        $this->conn->query("DELETE FROM mensaje WHERE usuarios_id=$idUsuario AND id=$idMensaje");
    }

    function aQuienSigo($id)
    {
        $query = $this->conn->query("SELECT us.* from  `usuarios` as us INNER JOIN  `siguiendo` as sig on us.id = sig.usuarioseguido_id where sig.usuarios_id = $id");
        return $query->fetchAll();
    }

    function cantidadLikesPorMsj($idMensaje)
    {
        $query = $this->conn->query("SELECT count(mensaje_id) from me_gusta where mensaje_id=$idMensaje");
        return $query->fetchAll();
    }

    function leDiLike($idMensaje, $idUsuario)
    {
        $query = $this->conn->query("SELECT count(*) FROM `me_gusta` WHERE usuarios_id=$idUsuario and mensaje_id=$idMensaje");
        return $query->fetch();
    }

    function like($id_user, $id_msj)
    {
        $this->conn->query("INSERT INTO me_gusta (usuarios_id, mensaje_id) VALUES ($id_user, $id_msj)");
    }

    function disLike($id_user, $id_msj)
    {
        $this->conn->query("DELETE FROM me_gusta WHERE usuarios_id=$id_user AND mensaje_id=$id_msj");
    }
}
