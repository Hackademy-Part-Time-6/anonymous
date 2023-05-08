import { validarExt } from "./changes.js";
import { imprimirModal } from "./modal.js";


export function submit(e){
    if (e.target.matches(".form__principal")) {
        e.preventDefault();
        validarExt();
        imprimirModal(".modal");
      }
}
