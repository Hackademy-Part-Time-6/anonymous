import {bloquearCheckbox} from "./checkbox.js";

const validarExt = () => {
    const archivoInput = document.getElementById("file");
    const archivoRuta = archivoInput.value;
    const extensionesPermitidas = /(.jpg,.png,.img)$/i;
  
    const preview = document.querySelectorAll(".preview");
  
    //console.log(archivoInput);
    //console.log(archivoRuta);
    //console.log(extensionesPermitidas);
  
    if (!extensionesPermitidas.exec(archivoRuta)) {
      preview[0].innerHTML = `<p class="error message"><strong>El Formato de La Imagen No Es VáLido Debe Ser .jpg</strong></p>`;
      archivoInput.value = "";
      return false;
    } else {
      if (archivoInput.files && archivoInput.files[0]) {
        const visor = new FileReader();
        //console.log(visor);
        //console.log(archivoInput.files[0].name);
        // console.log(archivoInput.files[0].size);
        if (archivoInput.files[0].size > 4000000) {
          preview[0].innerHTML = `<p class="error message"><strong>El Archivo Supera el Limite de 4mb</strong></p>`;
          return;
        }
        preview.innerHTML = `<progress></progress>`;
        visor.onload = (e) => {
          preview.forEach((img) => {
            img.innerHTML = `<img src="${e.target.result}" width="200" heigth="200" class="form__img" alt="${archivoInput.files[0].name}">`;
          });
        };
        visor.readAsDataURL(archivoInput.files[0]);
      }
    }
  };

export {validarExt}

export function changes(e) {
    if (e.target.matches(".gen_input")) {
        validarExt(e);
      }
      if (e.target.matches(".form-checkbox")) {
        bloquearCheckbox(e);
      }
}