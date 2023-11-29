const aumentarBtn = document.getElementById("aumentar-btn");
const decrecerBtn = document.getElementById("decrecer-btn");
const cantidadInput = document.getElementById("cantidad");
let cantidad = Number(cantidadInput.innerHTML);
const continuar = document.getElementById("submit");

document.addEventListener("DOMContentLoaded", () => {
  cantidadInput.value = 0;
});

aumentarBtn.addEventListener("click", (event) => {
  event.preventDefault();
  if (continuar.classList.contains('transparent')) {
    continuar.classList.remove('transparent')
  }
  cantidad += 1;
  cantidadInput.value = cantidad;
});

decrecerBtn.addEventListener("click", (event) => {
  event.preventDefault();
  if (cantidad > 0) {
    cantidad -= 1;
    cantidadInput.value = cantidad;
    if (cantidad === 0 && !(continuar.classList.contains('transparent'))) {
      continuar.classList.add('transparent')
    }
  }
});
