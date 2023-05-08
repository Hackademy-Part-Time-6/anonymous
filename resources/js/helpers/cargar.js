const cargarSelect = (selectID, array) => {
  const $select = document.getElementById(selectID);
  let texto = "";
  if ($select) {
    for (let i = 1; i < array.length; i++) {
      texto += `
          <option value="${i}">${array[i]}</option>
          `;
    }

    // console.log(texto);
    $select.innerHTML = texto;
  }
  return false;
};

const opcionesCarrera = [
  "",
  "Administracion en Informatica",
  "Administracion en Organizacion y Sistema",
  "Administracion Materiales y Financieros",
  "Administracion en Recursos Humanos",
  "Administracion en Mercadeo",
  "Agronomia",
  "Educacion",
  "Educacion Inicial",
  "Educacion Preescolar",
  "Educacion Mencion Matematicas",
  "Educacion Mencion Ingles",
  "Ciencias Sociales",
  "Medicina Veterinaria",
  "Fisioterapia",
];

const cargarColores = (containerId) => {
  const $containerColores = document.querySelector(containerId);
  const colores = [

    //Barra de colores Personalizados
    
    `linear-gradient(
      to top,
       #fdcbf1 0%,
        #fdcbf1 1%, 
        #e6dee9 100%
    )`,
    "#F97",
    "#AC9",
    "#B77",
    ,
    `     linear-gradient(
      to top, 
      #30cfd0 0%,
       #330867 100%)
    `
    ,
    `linear-gradient(
      120deg, 
      #89f7fe 0%, 
      #66a6ff 100%
      )`,

    `linear-gradient(
      hsl(300,50%,50%),
      hsl(240,50%,50%)
    )`,
  
    `linear-gradient(
      pink,
      violet
    )`,

  ];
  let texto = "";
  if ($containerColores) {
    colores.forEach((color) => {
      texto += `
        <button class="color" data-color="${color}" style="background: ${color}"></button>
      `;
    });

    $containerColores.innerHTML = texto;
  }
  return false;
};

export { cargarSelect, opcionesCarrera, cargarColores };
