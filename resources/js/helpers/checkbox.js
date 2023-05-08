const bloquearCheckbox = (e) => {
    const checkbox = document.querySelectorAll(".form-checkbox");
    for (let i = 0; i < checkbox.length; i++) {
      if (e.target === checkbox[0] && checkbox[0].checked === false) {
        console.log("Se cumple");
        checkbox[1].disabled = false;
      }
      if (e.target === checkbox[0]) {
        checkbox[1].disabled = true;
      }

      if (e.target === checkbox[1]) {
        checkbox[0].disabled = true;
      }
    }
}

export {bloquearCheckbox}