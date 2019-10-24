var input = document.getElementById('usuario');
var correo = document.getElementById('email');
function carg(elemento) {
  d = elemento.value;
  if(d == "1"){
      input.placeholder="Código del grupo";
      correo.disabled = true;
      correo.type="hidden";
  }else{
    input.placeholder="Usuario";
    correo.placeholder="Correo eléctronico";
    correo.disabled = false;
      correo.type="enabled";
  }
}