// Importaciones de modulo.
import {
  cargarColores,
  cargarSelect,
  opcionesCarrera,
} from "./helpers/cargar.js";
import { acordeon, colocarColorLocalStorage } from "./helpers/efectos.js";
import { click } from './helpers/click.js';
import { caracteres, teclado } from "./helpers/teclado.js";
import { submit } from "./helpers/submit.js";
import { changes } from "./helpers/changes.js";

// Evento cuando carga el documento, cuando esta listo.
document.addEventListener("DOMContentLoaded", (e) => {
  // Funcion para hacer el select dinamico.
  cargarSelect("carrera", opcionesCarrera);
  cargarColores(".container-colors");
  colocarColorLocalStorage("[data-theme]");
  caracteres();
});


// Eventos para enviar fromularios
document.addEventListener("submit", (e) => {
  submit(e);
});

// Evento cuando ahi un click en el documento.
document.addEventListener("click", (e) => {
  click(e);
});

// Se presionan las teclas
document.addEventListener("keypress", (e) => {
  teclado(e);
});

// Cuando haya cambios en un elemento.
document.addEventListener("change", (e) => {
  changes(e);
});

acordeon(".menu-container-links");

