console.log("habitaciones-detalle");

const resizeCarouselImages = () => {
  const $imgs = document.querySelectorAll("#slider .slides img");
  Array.from($imgs).forEach(($img) => {
    const src = $img.getAttribute("src").split("-1000x1000.png").join("");
    $img.setAttribute("src", `${src}.png`);
  });
};

const insertAlert = () => {
  if (location.hash !== "#wpcf7-f10081-p10135-o1") return;
  const $siteContent = document.querySelector(".container.site-content");
  if (!$siteContent) return;
  const $alertHtml = `
<div class="alert alert-success alert-dismissible" role="alert" id="alert-form">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ¡Formulario enviado correctamente!
</div>
`;
  $siteContent.insertAdjacentHTML("afterbegin", $alertHtml);
  const $btnClose = document.querySelector("#alert-form button");
  $btnClose &&
    $btnClose.addEventListener("click", () => {
      document.querySelector("#alert-form").remove();
    });
};

const validateForm = ($form) => {
  let cont;
  const $btnSend = document.querySelector("#btn-send");
  if (!$form || !$btnSend) return;

  const validate = () => {
    cont = 0;
    const $inputs = $form.querySelectorAll("input");
    Array.from($inputs).forEach(($input) => {
      if ($input.value.trim().length === 0) cont++;
    });

    cont > 0
      ? $btnSend.classList.add("no-validate")
      : $btnSend.classList.remove("no-validate");
  };
  const addEvents = () => {
    const $inputs = $form.querySelectorAll("input");
    Array.from($inputs).forEach(($input) => {
      $input.addEventListener("keydown", validate);
      $input.addEventListener("keyup", validate);
      $input.addEventListener("focus", validate);
      $input.addEventListener("blur", validate);
    });
  };

  validate();
  addEvents();
};

const changeFormReservation = ($form) => {
  const parentInputs = $form?.querySelector(`.hb-form-table`),
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

    const yourName = $formCF7.querySelector(`[name="your-name"]`);
    const yourSubject = $formCF7.querySelector(`[name="your-subject"]`);
    const $title = document.querySelector(
      ".summary.entry-summary > .title h4 a"
    );

    if (yourName)
      yourName.value = $form.querySelector(`[name="full_name"]`).value;
    if (yourSubject)
      yourSubject.value = `Reservación - ${$title?.textContent || ""}`;
    $formCF7.submit();
  });
};

const init = () => {
  resizeCarouselImages();
};

const initDOMReady = () => {
  const $form = document.querySelector(`[name="hb-search-form"]`);
  insertAlert();
  changeFormReservation($form);
  validateForm($form);
};

init();
document.addEventListener("DOMContentLoaded", () => {
  initDOMReady();
});
