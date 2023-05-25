
const acordeon = (elemento) => {
  const $acordeon = document.querySelectorAll(elemento);

  $acordeon.forEach((item) => {
    item.addEventListener("click", (e) => {
      const padre = e.target.parentNode;
      console.log(padre);
      padre.children[1].classList.toggle("active");
      console.log(padre.children[1]);
      padre.parentNode.children[1].classList.toggle("active");
      console.log(padre.parentNode.children[1]);
      console.log(padre.parentNode.children[1].children);
      console.log(padre.parentNode.children[1].classList);
      console.log(padre.children[1].classList);
      console.log(padre.children[1].style.height);
      console.log(padre.parentNode.children[1].style.height);

      // let altura = 0;
      // let elemento = e.target;
      // console.log(e.target);
      // let elementoInterno = elemento.parentNode.children[1];
      // console.log(elementoInterno);
      // let elementosInterno = elemento.parentElement.children[1].children;
      // console.log(elementosInterno);
      // for (let i = 0; i < elementosInterno.length; i++)
      //   altura += elementosInterno[i].scrollHeight;

      // elementoInterno.style.height = `${altura}px`;

      // elementoInterno.classList.toggle("active");

      // if (elementoInterno.classList.contains("active")) {
      //   elementoInterno.style.height = `0px`;
      // } else {
      //   elementoInterno.style.height = `${altura}px`;
      //   console.log(elementoInterno.style.height);
      // }

    });
  });
};


const colocarColorLocalStorage = (elementos) => {
  const $elementos = document.querySelectorAll(elementos);
  $elementos.forEach((elemento) => {
    elemento.style.setProperty(
      "--color-background",
      localStorage.getItem("color")
    );
  });
}


export { acordeon, colocarColorLocalStorage };