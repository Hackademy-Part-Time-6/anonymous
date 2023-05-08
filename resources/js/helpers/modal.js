const llenarModal = (modal, persona) => {

    const $modal = document.querySelector(modal);
    const datos = persona;
    console.log(persona);

  $modal.innerHTML = `
    <form class="form__modal">
       <div class="form__data">
       Nombre:<input class="form__modal-input" value=${datos.nombre}>
       Cédula:<input class="form__modal-input" value=${datos.cedula}>
       Email:<input class="form__modal-input" value=${datos.mail}>
       Celular: <input class="form__modal-input" value=${datos.celular}> 
       </div>
       <div class="form__data">
       <div/>
       <div class="form__data preview">
       <button type="submit" class="button--validate">Validar Información</button>
       </div>
    </form>
  `;
};
const imprimirModal = (elemento) =>
  document.querySelector(elemento).classList.toggle("active");
export { llenarModal ,imprimirModal};
