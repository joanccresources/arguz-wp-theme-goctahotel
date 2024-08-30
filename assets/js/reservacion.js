console.log("Reservación");

const isRedirect = () => {
  // Crea una instancia de URLSearchParams para los parámetros de la URL actual
  const urlParams = new URLSearchParams(window.location.search);
  // Obténemos los valores de las variables
  const check_in_date = urlParams.get("check_in_date");
  const check_out_date = urlParams.get("check_out_date");
  const adults_capacity = urlParams.get("adults_capacity");
  const max_child = urlParams.get("max_child");

  if (
    check_in_date === null ||
    check_out_date === null ||
    adults_capacity === null ||
    max_child === null
  )
    return false;
  return true;
};

const insertAlert = () => {
  // if (location.hash !== "#wpcf7-f10081-p10135-o1") return;
  if (location.hash === "" || !location.hash.includes("#wpcf7-")) return;
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
  // Ocultar la alerta amarilla
  document.querySelector(".alert-form").classList.add("d-none");
  $btnClose &&
    $btnClose.addEventListener("click", () => {
      document.querySelector("#alert-form").remove();
    });
};

const populateReservationForm = ($form) => {
  // Crea una instancia de URLSearchParams para los parámetros de la URL actual
  const urlParams = new URLSearchParams(window.location.search);

  // Obténemos los valores de las variables
  const check_in_date = urlParams.get("check_in_date");
  const check_out_date = urlParams.get("check_out_date");
  const adults_capacity = urlParams.get("adults_capacity");
  const max_child = urlParams.get("max_child");

  // Si alguno viene sin valor lo cancelamos
  if (
    check_in_date === null ||
    check_out_date === null ||
    adults_capacity === null ||
    max_child === null
  )
    return;

  // Rellena los campos del formulario con los valores obtenidos
  $form.querySelector(`[name="check_in_date"]`).value = check_in_date;
  $form.querySelector(`[name="check_out_date"]`).value = check_out_date;
  $form.querySelector(`[name="max_child"]`).value = max_child;
  // Adults
  $form.querySelector(`[name="adults_capacity"]`).value = adults_capacity;
  $form.querySelector(".adults-input").value = adults_capacity;
  // document.querySelector("#select2-adults_capacity-p7-container").textContent =
  //   adults_capacity;

  if (window.innerWidth >= 768) {
    const $child = document.querySelector(".container.site-content");
    $child && $child.scrollIntoView({ behavior: "smooth" });
  } else {
    const $child = document.getElementById("child");
    $child && $child.scrollIntoView({ behavior: "smooth" });
  }
};

const changeFormReservation = ($form) => {
  // Agregamos los inputs y el boton
  const $container = $form.querySelector(".hb-form-table");
  const html = `<div class="row row-add-form">
	<div class="col-sm-12 col-md-6">
    <p>
      <span class="wpcf7-form-control-wrap" data-name="your-name">
        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Nombre completo" value="" type="text" name="full_name">
      </span>
    </p>
  </div>
  <div class="col-sm-12 col-md-6">
    <p>
      <span class="wpcf7-form-control-wrap" data-name="your-email">
        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Correo electrónico" value="" type="email" name="your-email">
    </span>
    </p>
  </div>
  <div class="col-sm-12 col-md-6">
    <p>
      <span class="wpcf7-form-control-wrap" data-name="your-email">
        <input type="tel" class="" value="" placeholder="Celular" autocomplete="off" id="phone" name="phone">
    </span>
    </p>
  </div>
  <div class="col-sm-12 col-md-6">
    <p>
      <span class="wpcf7-form-control-wrap" data-name="your-message">
        <textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Mensaje" name="your-message"></textarea>
      </span>
    </p>
  </div>
  <div class="w-100 text-center" style="float:left;margin-top: 20px;padding-inline: 15px;">
    <button type="button" class="wphb-button" id="btn-send">ENVIAR</button>
  </div>
</div>`;
  $container.insertAdjacentHTML("afterend", html);

  // Si viene de Home entonces ingresamos un alerta y hacemos focus en el input
  if (!isRedirect()) return;
  const $htmlAlert = `<div class="alert alert-warning alert-form" role="alert">
      Por favor complete los campos restantes.
    </div>`;
  $container.insertAdjacentHTML("afterend", $htmlAlert);
  // $form.querySelector(`[name="full_name"]`).focus();
};

const validateForm = ($form) => {
  // Validar los inputs
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

const sendForm = ($form) => {
  const $btnSend = $form.querySelector("#btn-send");
  const $formCF7 = document.querySelector("#reservacion-form form");
  if (!$formCF7 || !$btnSend) return;

  $btnSend.addEventListener("click", () => {
    const formDataReservation = new FormData($form);
    formDataReservation.forEach((value, key) => {
      const input = $formCF7.querySelector(`[name="${key}"]`);
      if (input) input.value = value;
    });

    const yourName = $formCF7.querySelector(`[name="your-name"]`);
    const yourSubject = $formCF7.querySelector(`[name="your-subject"]`);
    if (yourName)
      yourName.value = $form.querySelector(`[name="full_name"]`).value;
    if (yourSubject) yourSubject.value = "Reservación";

    $formCF7.submit();

    // $form
    // November 29, 2024 check_in_date
    // November 30, 2024 check_out_date
    // 4 adults_capacity
    // 2 max_child
    // Joan full_name
    // joan04@gmail.com your-email
    // 900222888 phone
    // Quiero la cama mas barata porfavor your-message
    // e07f988467 nonce
    // /reservacion/?check_in_date=November+29%2C+2024&check_out_date=November+30%2C+2024&adults_capacity=4&max_child=2 _wp_http_referer
    // results hotel-booking
    // "1" widget-search
    // hotel_booking_parse_search_params action
    // 1 paged

    // $formCF7
    // 10081 _wpcf7
    // 5.9.8 _wpcf7_version
    // es_ES _wpcf7_locale
    // wpcf7-f10081-p10194-o1 _wpcf7_unit_tag
    // 10194 _wpcf7_container_post
    //  _wpcf7_posted_data_hash
    //  your-message *()
    //  your-name *
    //  your-subject *
    //  full_name **
    //  your-email **
    //  phone **
    //  check_in_date **
    //  check_out_date **
    //  adults_capacity **
    //  max_child **
  });
};

const init = () => {
  const $form = document.querySelector(`[name="hb-search-form"]`);
  populateReservationForm($form);
  changeFormReservation($form);
  validateForm($form);
  sendForm($form);
  insertAlert();
};

init();
document.querySelector(".footer-galeria").style.backgroundColor = "#F7F7F7";