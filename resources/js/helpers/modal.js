export const mostrarMensaje = (mensaje, tipo) => {
    const mensajeElemento = document.createElement("div");
    mensajeElemento.classList.add("mensaje", tipo);
    mensajeElemento.textContent = mensaje;

    document.body.appendChild(mensajeElemento);

    setTimeout(() => {
        mensajeElemento.remove();
    }, 3000);
};

const llenarModal = (data) => {
    const $modal = document.querySelector(".modal-custom");
    const csrfToken = "{{ csrf_token() }}";

    data.id = data.id.trim();

    $modal.innerHTML = `
    <form class="form__modal" action="/revisor/ads/delete/${data.id}" method="POST" data-delete="${data.id}">
      <input type="hidden" name="_token" value="${csrfToken}">
      <div class="form__data">
        <label for="title" class="form__label">Deseas Eliminar El Anuncio: <b>${data.title}</b></label>
      </div>
      <div class="form__buttons">
        <button type="button" class="button button--cancel">Cancelar</button>
        <button type="submit" class="button button--accept">Aceptar</button>
      </div>
    </form>
  `;
};

const imprimirModal = (elemento) =>
    document.querySelector(elemento).classList.toggle("active");
export { llenarModal, imprimirModal };
