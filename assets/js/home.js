const changeFormReservation = () => {
  const $form = document.querySelector(`[name="hb-search-form"]`),
    parentSubmit = $form?.querySelector(".hb-submit");
  // const htmlBtnSubmit = `<a href="/reservacion/" target="_blank" class="wphb-button" id="btn-send">CONSULTAR</a>`;
  const htmlBtnSubmit = `<a class="wphb-button" id="btn-send">CONSULTAR</a>`;
  if (!$form || !parentSubmit) return;
  parentSubmit.insertAdjacentHTML("afterbegin", htmlBtnSubmit);

  const $btnSend = document.querySelector("#btn-send");

  $btnSend &&
    $btnSend.addEventListener("click", (event) => {
      const check_in_date = $form.querySelector(`[name="check_in_date"]`);
      const check_out_date = $form.querySelector(`[name="check_out_date"]`);
      const adults_capacity = $form.querySelector(`[name="adults_capacity"]`);
      const max_child = $form.querySelector(`[name="max_child"]`);

      location.href = `/reservacion/?check_in_date=${encodeURIComponent(check_in_date.value)}&check_out_date=${encodeURIComponent(check_out_date.value)}&adults_capacity=${encodeURIComponent(adults_capacity.value)}&max_child=${encodeURIComponent(max_child.value)}`;
      // location.href = `/reservacion/`;

      // const formDataReservation = new FormData($form);
      // console.log("$formCF7", $formCF7);
      // // Recorremos el form de la pagina y le asignamos al contact form7
      // formDataReservation.forEach((value, key) => {
      //   const input = $formCF7.querySelector(`[name="${key}"]`);
      //   if (input) input.value = value;
      // });
      // $formCF7.submit();
    });
};

const init = () => {
  changeFormReservation();
};

init();
