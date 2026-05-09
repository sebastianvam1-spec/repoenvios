const buscador = document.getElementById("buscar");

buscador.addEventListener("keyup", () => {

let filtro = buscador.value.toLowerCase();

let filas = document.querySelectorAll("table tr");

filas.forEach((fila, index) => {

if(index === 0) return;

let texto = fila.innerText.toLowerCase();

fila.style.display =
texto.includes(filtro)
? ""
: "none";

});

});