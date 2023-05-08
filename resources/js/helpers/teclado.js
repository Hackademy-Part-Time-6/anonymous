const soloNumeros = (e) => {
    // console.log(e.charCode);
    if(e.charCode === 43 ||
       e.charCode === 44 ||
       e.charCode === 45 ||
       e.charCode === 46 ||
       e.charCode === 47
    ) e.preventDefault();

    if(e.charCode > 47 && e.charCode > 57 ) e.preventDefault();
};

const soloLetras = (e) => {
    console.log(e.charCode);
    //console.log(e.charCode > 47 && e.charCode <= 57);
    if(e.charCode === 39 ||
       e.charCode === 43 ||
       e.charCode === 44 ||
       e.charCode === 45 ||
       e.charCode === 46 || 
       e.charCode === 60 ||
       e.charCode === 123 ||
       e.charCode === 124 || 
       e.charCode === 125 ||
       e.charCode === 180 ||
       e.charCode === 191 ||
       e.charCode === 241
    ) e.preventDefault();
    if(e.charCode > 47 && e.charCode  <= 57 ) e.preventDefault();
};

//  Pasar un selector sde un in input.
// Pasar un limite para bloquear los caracteres 
// del input en cuestion garantizando la seguridad del sistema.
const minimoDeCaracter = (input,limite) => {
    const $input = document.querySelector(input);
    if ($input) $input.maxLength = limite;
    return false;       
};


export function caracteres () {
    minimoDeCaracter(".menu__panel-form-input",8);
}


export function teclado(e) {
    if(e.target.matches("[data-number]")) soloNumeros(e);

    if(e.target.matches("[data-string]")) soloLetras(e);
}
