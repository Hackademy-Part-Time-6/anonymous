import { removerClase } from "./click.js";
import { mostrarMensaje } from "./modal.js";

const searchAds = async (query) => {
    try {
      const response = await fetch(`/revisor/ads/search/${query}`);
      const data = await response.json();

      createData(data);
      const newUrl = `/revisor/ads/search/${query}`;
      window.history.pushState({ path: newUrl }, '', newUrl);

    } catch (error) {
      console.error(error);
    }
  };

export const updateStatusElements = async () => {
    const pendingElement = document.querySelector(".pending");
    const approvedElement = document.querySelector(".approved");

    try {
        const responseApproved = await fetch("/revisor/aprobate");
        const countApproved = await responseApproved.json();

        const responsePending = await fetch("/revisor/pending");
        const countPending = await responsePending.json();

        pendingElement.textContent = `Pendientes: ${
            countPending.count ? countPending.count : countPending.message
        }`;
        approvedElement.textContent = `Aprobadas: ${
            countApproved.count ? countApproved.count : countApproved.message
        }`;
    } catch (error) {
        console.error(error);
    }
};

const createData  = async (data) => {
    const tabla = document.querySelector(".table-items");
    const loader = document.querySelector(".loader");

    let html = "";
    tabla.innerHTML = "";

    loader.classList.add("active");

    data.forEach((elemento) => {
        html += `
            <div class="table-data__row">
                <div class="table-data__info">
                    <a class="table-data__content center" href="/revisor/aprobate/${
                        elemento.id
                    }" data-id="${elemento.id}">${elemento.id}</a>
                    <p class="table-data__content center">${
                        elemento.category_id
                    }</p>
                    <p class="table-data__content center" data-title="${
                        elemento.title
                    }">${elemento.title}</p>
                    <p class="table-data__content center">${
                        elemento?.user?.name
                    }</p>
                    <div class="table-data__cell">
                        ${
                            elemento.is_accepted === null
                                ? '<p class="table-data__content center status-badge pending">Pendiente</p>'
                                : elemento.is_accepted
                                ? '<p class="table-data__content center status-badge approved">Aprobado</p>'
                                : '<p class="table-data__content center status-badge rejected">Rechazado</p>'
                        }
                    </div>
                    <a class="table-data__content center" href="/revisor/edit/${
                        elemento.id
                    }"><i class="icon-pencil"></i></a>
                    <a class="table-data__content center"><i class="icon-delete"></i></a>
                </div>
            </div>
        `;
    });
    await updateStatusElements();
    tabla.innerHTML = html;

    // Ocultar el loader
    loader.classList.remove("active");
}

const updateTable = async () => {
    
    try {
        const response = await fetch("/revisor/ads");
        const data = await response.json();
        createData(data);
        
    } catch (error) {
        console.error(error);
        // Ocultar el loader en caso de error
        loader.classList.remove("active");
    }
};

const eliminarAnuncio = async (e) => {
    try {
        const url = `/revisor/ads/delete/${e.target.getAttribute(
            "data-delete"
        )}`;
        const response = await fetch(url, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        });

        if (response.ok) {
            const data = await response.json();
            console.log(data.message);
            removerClase(".modal-custom", "active");
            mostrarMensaje(`${data.message}`, "success");
            await updateTable();
        } else {
            removerClase(".modal-custom", "active");
            mostrarMensaje("Hubo un error al eliminar el elemento", "error");
            console.log("Fallo");
            console.log("No se hizo manao");
        }
    } catch (error) {
        console.log(error);
    }
};

export function submit(e) {
    if (e.target.matches(".form__modal")) {
        e.preventDefault();
        eliminarAnuncio(e);
    }

    if(e.target.matches("#formAds")) {
        e.preventDefault();
        searchAds(e.target.children[0].value)
    }
}
