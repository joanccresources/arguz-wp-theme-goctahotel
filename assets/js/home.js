console.log("home");
const changeFormReservation = () => {
  const $form = document.querySelector(`[name="hb-search-form"]`),
    parentSubmit = $form?.querySelector(".hb-submit");
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
    });
};

const init = () => {
  changeFormReservation();
};

init();