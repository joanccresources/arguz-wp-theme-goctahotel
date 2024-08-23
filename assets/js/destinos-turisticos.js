const showAndHideNavigation = () => {
  const $tabMenu = document.getElementById("tab-menu"),
    $iconDown = $tabMenu?.querySelector(".fa-chevron-down"),
    $iconUp = $tabMenu?.querySelector(".fa-chevron-up"),
    $tabChild = document.querySelector(".tab-child");

  $tabMenu &&
    $tabMenu.addEventListener("click", () => {
      $tabChild.classList.toggle("d-none");
      $iconDown.classList.toggle("d-none");
      $iconUp.classList.toggle("d-none");
    });
};
const hideNavigation = () => {
  const $tabMenu = document.getElementById("tab-menu"),
    $iconDown = $tabMenu?.querySelector(".fa-chevron-down"),
    $iconUp = $tabMenu?.querySelector(".fa-chevron-up"),
    $tabChild = document.querySelector(".tab-child");

  $tabChild.classList.add("d-none");
  $iconDown.classList.remove("d-none");
  $iconUp.classList.add("d-none");
};

function openCity(evt, cityName) {
  let i, tabcontent, tablinks, mapContent;
  tabcontent = document.getElementsByClassName("tabcontent");
  mapContent = document.querySelectorAll(".turismo__map");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
    mapContent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  document.getElementById(`map-${cityName}`).style.display = "block";

  hideNavigation();

  if (!evt) return;
  evt.currentTarget.className += " active";
}

document.addEventListener("DOMContentLoaded", () => {
  showAndHideNavigation();

  const cityName = "destino-1";
  const $firstTab = document.getElementById(`tab-${cityName}`);
  if (!$firstTab) return;
  openCity(null, cityName);
  $firstTab.className += " active";
});
