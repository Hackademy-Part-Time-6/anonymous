/*
    agregarClase: Espera un elemento html
    para agregarle la clase active o removerla.
*/

const agregarClase = (elemento) =>
  document.querySelector(elemento).classList.toggle("active");

const coloresTemas = (e, elementos) => {
  const colorBackground = getComputedStyle(
    document.documentElement
  ).getPropertyValue("--color-background");

  const $elementos = document.querySelectorAll(elementos);
  localStorage.setItem("color", colorBackground);

  if (
    localStorage.getItem("color") === colorBackground ||
    localStorage.getItem("color") !== colorBackground
  ) {
    localStorage.setItem("color", e.target.dataset.color);
    $elementos.forEach((elemento) => {
      elemento.style.setProperty(
        "--color-background",
        localStorage.getItem("color")
      );
    });
  }
};

const acordeon = (e) => {
  let altura = 0;
  let elemento = e.target;
  let elementoInterno = elemento.parentNode.children[1];
  let elementosInterno = elemento.parentElement.children[1].children;
  for (let i = 0; i < elementosInterno.length; i++)
    altura += elementosInterno[i].scrollHeight;

  elementoInterno.style.height = `${altura}px`;

  elementoInterno.classList.toggle("active");

  if (elementoInterno.classList.contains("active")) {
    elementoInterno.style.height = `0px`;
  } else {
    elementoInterno.style.height = `${altura}px`;
  }
};


export function click(e) {
  // Funcion para agregar clases.

  if (e.target.matches(".toggle-button")) agregarClase(".panel");

  if (e.target.matches(".toggle-button")) agregarClase(".main__content");

  if (e.target.matches(".button--close")) agregarClase(".modal");

  if (e.target.matches(".icon-user"))
    agregarClase(".profile__menu-container");

  if (e.target.matches(".form__link")) agregarClase(".container__form");

  if (e.target.matches(".color")) coloresTemas(e, "[data-theme]");

  // if (e.target.matches(".menu-container-options") || e.target.matches(".menu__option") || e.target.matches(".menu__icon")) { acordeon(e);}

}
