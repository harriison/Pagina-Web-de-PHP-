function validarLogin() {
  var msj = "";
  var error = false;

  var user = document.forms["Login"]["usuario"].value;
  if (user == "" || validarUsuario(user) == false) {
    msj = msj + "-Usuario inválido \n";
    error = true;
  }

  var contrasena = document.forms["Login"]["password1"].value;
  if (contrasena == "" || validarContraseña(contrasena) == false) {
    msj =
      msj +
      "-La contraseña no es válida, debe tener al menos seis caracteres, un digito, al menos una minúscula, al menos una mayúscula y un simbolo ($@$!%*?&)";
    error = true;
  }
  if (error == true) {
    alert(msj);
    return false;
  }
  return true;
}

function validarRegistro() {
  var msj = "";
  var error = false;

  var x = document.forms["Register"]["nombre"].value;
  if (x == "" || validarTexto(x) == false) {
    msj = msj + "-Nombre inválido \n";
    error = true;
  }
  var apellido = document.forms["Register"]["apellido"].value;
  if (apellido == "" || validarTexto(apellido) == false) {
    msj = msj + "-Apellido inválido \n";
    error = true;
  }

  var usuario = document.forms["Register"]["usuario"].value;
  if (usuario == "" || usuario.length < 6 || validarUsuario(usuario) == false) {
    msj = msj + "-Usuario inválido \n";
    error = true;
  }

  var email = document.forms["Register"]["email"].value;
  if (email == "" || validarEmail(email) == false) {
    msj = msj + "-Falta completar el email \n";
    error = true;
  }

  var contrasena = document.forms["Register"]["password1"].value;
  var contrasena2 = document.forms["Register"]["password2"].value;
  if (contrasena == "" || validarContraseña(contrasena) == false) {
    msj =
      msj +
      "-La contraseña no es válida, debe tener al menos seis caracteres, un digito, al menos una minúscula, al menos una mayúscula y un simbolo ($@$!%*?&) \n";
    error = true;
  } else if (contrasena != contrasena2) {
    msj = msj + "-Las contrasenas no coinciden \n";
    error = true;
  }
  var imagen = document.forms["Register"]["imagen"].files;
  if (imagen.length == 0) {
    msj = msj + "-Ingrese una imagen \n";
    error = true;
  }
  
  if (error == true) {
    alert(msj);
    return false;
  }
  return true;
}




function validarUsuario(usuario) {
  return /^[A-Za-z0-9]+$/.test(usuario);
}

function validarContraseña(contraseña) {
  return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%#*?&])([A-Za-z\d$@$!%#*?&]|[^ ]){6,}$/.test(
    contraseña
  );
}

function validarEmail(mail) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
}

function validarTexto(text) {
  return /^[A-Za-z ]+$/.test(text);
}

function validarImagen(){
  var fileInput = document.getElementById('imagen');
  var filePath = fileInput.value;
  var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
  if(!allowedExtensions.exec(filePath)){
      alert('Sube una imagen valida con extension .jpeg/.jpg/.png/.gif');
      fileInput.value = '';
      return false;
  }else{
      //Image preview
      if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
      }
  }
}


function validarTrino(){
  var msj='';
  var error = false;
  var limiteCaracteres = 140;
  var caracteres = document.forms["Trino"]["comentario"].value.length;
  var x = document.forms["Trino"]["comentario"].value;
  if ((x == "") || (trinoVacio(x) == false )){
    msj = msj + "-Falta comentar \n";
    error = true;
  }else
    if (caracteres>limiteCaracteres){
      msj = msj + "-Sobrepasaste el limite de 140 caracteres \n";
      error = true;
    }
  
  if(error == true){
    alert(msj);
    return false;
}
}

function trinoVacio(text){
  dato = /\S{1,}/;
  return dato.test(text);
}


function validarCambioContraseña(){
  
  var msj = '';
  var error = false;

  var contrasenaAct = document.forms["editPass"]["actPassword"].value;
  var contrasena = document.forms["editPass"]["password1"].value;
  var contrasena2 = document.forms["editPass"]["password2"].value;
  if (contrasenaAct == ""){
    msj = msj + "-Escriba la contraseña actual \n";
    error = true;
  }
  if ((contrasena == "") || (validarContraseña(contrasena) == false)){
    msj = msj + "-La contraseña no es válida, debe tener al menos seis caracteres, un digito, al menos una minúscula, al menos una mayúscula y un simbolo ($@$!%*?&) \n";
    error = true;
  }
  else 
  if (contrasena != contrasena2){
      msj = msj + "-Las contrasenas no coinciden \n";
      error= true;
  }

  if(error == true){
    alert(msj);
    return false;
  }
}

function validarEditarPerfil() {
  var msj = "";
  var error = false;

  var x = document.forms["editProfile"]["nombre"].value;
  if (x == "" || validarTexto(x) == false) {
    msj = msj + "-Nombre inválido \n";
    error = true;
  }
  var apellido = document.forms["editProfile"]["apellido"].value;
  if (apellido == "" || validarTexto(apellido) == false) {
    msj = msj + "-Apellido inválido \n";
    error = true;
  }

  var usuario = document.forms["editProfile"]["usuario"].value;
  if (usuario == "" || usuario.length < 6 || validarUsuario(usuario) == false) {
    msj = msj + "-Usuario inválido \n";
    error = true;
  }

  var email = document.forms["editProfile"]["email"].value;
  if (email == "" || validarEmail(email) == false) {
    msj = msj + "-Falta completar el email \n";
    error = true;
  }

  var imagen = document.forms["editProfile"]["imagen"].files;
  if (imagen.length == 0) {
    msj = msj + "-Ingrese una imagen \n";
    error = true;
  }
  
  if (error == true) {
    alert(msj);
    return false;
  }
  return true;
}

