// paginador
const translatePaginationTexts = () => {
  const $next = document.querySelector(".next.page-numbers");
  const $prev = document.querySelector(".prev.page-numbers");

  if ($next) {
    $next.textContent = "Siguiente";
  }
  if ($prev) {
    $prev.textContent = "Anterior";
  }
};

// Hero Room
const translateHeroText = () => {
  const $itemsLI = document.querySelectorAll("#breadcrumbs li") || [];
  const $itemsA = document.querySelectorAll("#breadcrumbs li a") || [];

  const lengthA = Array.from($itemsA).filter(
    (item) => item.textContent === "Rooms"
  ).length;
  if (lengthA > 0) {
    $itemsA.forEach((item) => {
      if (item.textContent === "Rooms") {
        item.textContent = "Habitaciones";
      }
    });
  } else {
    $itemsLI.forEach((item) => {
      if (item.textContent === "Rooms") {
        item.textContent = "Habitaciones";
      }
    });
  }
  return;
};

const changeFormReservation = () => {
  const $form = document.querySelector(`[name="hb-search-form"]`),
    parentInputs = $form?.querySelector(`.hb-form-table`),
    parentSubmit = $form?.querySelector(".hb-submit");

  const $formCF7 = document.querySelector("form.wpcf7-form");

  const html = `
  <li class="hb-form-field">
    <label>Nombre completo</label>
    <div class="hb-form-field-input hb_input_field">
      <input type="text" class="" value="" placeholder="Juan Perez" autocomplete="off" id="full_name" name="full_name">
    </div>
  </li>
  <li class="hb-form-field">
    <label>Correo</label>
    <div class="hb-form-field-input hb_input_field">
      <input type="email" class="" value="" placeholder="juan@gmail.com" autocomplete="off" id="email" name="your-email">
    </div>
  </li>
  <li class="hb-form-field">
    <label>Celular</label>
    <div class="hb-form-field-input hb_input_field">
      <input type="tel" class="" value="" placeholder="999999999" autocomplete="off" id="phone" name="phone">
    </div>
  </li>
  `;
  const htmlBtnSubmit = `<button type="button" class="wphb-button" id="btn-send">Consultar</button>`;
  if (!$form || !parentInputs || !parentSubmit) return;
  parentInputs.insertAdjacentHTML("afterbegin", html);
  parentSubmit.insertAdjacentHTML("afterbegin", htmlBtnSubmit);

  const $btnSend = document.querySelector("#btn-send");

  $btnSend.addEventListener("click", (event) => {
    const formDataReservation = new FormData($form);
    console.log("$formCF7", $formCF7);
    // Recorremos el form de la pagina y le asignamos al contact form7
    formDataReservation.forEach((value, key) => {
      const input = $formCF7.querySelector(`[name="${key}"]`);
      if (input) input.value = value;
    });
    $formCF7.submit();
    // -----------------------
    //  full_name: Joan Cochachi
    //  email: pedro@gmail.com
    //  phone: 90055665
    //  check_in_date: August 08, 2024
    //  check_out_date: August 16, 2024
    //  adults_capacity: 1
    //  max_child: 0
    //  nonce: a5d17ab6e6
    //  _wp_http_referer: /rooms/double-room-5/
    //  hotel-booking: results
    //  widget-search: 1
    //  action: hotel_booking_parse_search_params
    //  paged: 1
  });
};

document.addEventListener("DOMContentLoaded", () => {
  translatePaginationTexts();
  translateHeroText();

  if (
    Array.from(location.pathname).filter((item) => item === "/").length >= 3 &&
    location.pathname.includes("/rooms/")
  ) {
    // changeFormReservation();
  }
});

addEventListener("DOMContentLoaded", () => {
  const btnWasap = document.querySelectorAll(`[href*="https://wa.me/"]`);
  btnWasap.forEach((btn) => {
    btn.setAttribute("target", "_blank");
  });
});

const loadScriptForPathname = () => {
  const loadScript = () => {};

  // Obtener el pathname de la URL actual
  const currentPath = window.location.pathname;
  // Verificar si el pathname comienza con '/rooms/' y tiene algo más después de '/rooms/'
  if (
    currentPath.startsWith("/rooms/") &&
    /^\/rooms\/[^\/]+\/$/.test(currentPath)
  ) {
    // Crear un nuevo elemento <script>
    const script = document.createElement("script");
    script.type = "module";
    script.src =
      "/wp-content/themes/sailing-child-goctahotel/assets/js/habitaciones-detalle.js"; // Ajusta la ruta si es necesario
    // Agregar el script al DOM, justo antes de cerrar el <body>
    document.body.appendChild(script);
  }
};

// Usar la función para cargar los scripts cuando el pathname coincida
window.addEventListener("DOMContentLoaded", loadScriptForPathname);
// loadScriptForPathname();
