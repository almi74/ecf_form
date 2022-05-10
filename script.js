let nombre = document.getElementsById("nombre");
let errorfirst = document.getElementsById("errorfirst");
let regExNombre = /a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ ,.'-]{3,20}/;
let match = text.match (regExNombre);

let validarNombre = function() {
  if(nombre.value.length == 0) {
    errorfirst.innerHTML = "Escriba tu nombre.";
    return false;
  }
  if(!nombre.value.match(/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,20})) {
    errorfirst.innerHTML = "El nombre no parece válido.";
    return false;
  }

  else {
errorfirst.innerHTML = <span> OK !</span>;
return true; }};
nombre.addEventListener("keyup", validarNombre);