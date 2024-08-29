console.log("servicios");

const addLinkReserva = () => {
  const title = document.querySelector("#servicios-reserva .heading__primary");
  title &&
    title.addEventListener("click", () => {      
      location.href = "https://goctaamazonashotel.com/reservacion/";
    });
};

const init = () => {
  addLinkReserva();
};

init();
