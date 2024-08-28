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

document.addEventListener("DOMContentLoaded", () => {
  translatePaginationTexts();
  translateHeroText();
});

addEventListener("DOMContentLoaded", () => {
  const btnWasap = document.querySelectorAll(`[href*="https://wa.me/"]`);
  btnWasap.forEach((btn) => {
    btn.setAttribute("target", "_blank");
  });
});

const loadScriptForPathname = () => {
  // Obtener el pathname de la URL actual
  const currentPath = window.location.pathname;
  // Verificar si el pathname comienza con '/rooms/' y tiene algo más después de '/rooms/'
  // if (
  //   currentPath.startsWith("/rooms/") &&
  //   /^\/rooms\/[^\/]+\/$/.test(currentPath)
  // ) {
  // }
  // if (currentPath === "/home/" || currentPath === "/") {
  //   const script = document.createElement("script");
  //   script.type = "module";
  //   script.src =
  //     "/wp-content/themes/sailing-child-goctahotel/assets/js/home.js";
  //   document.body.appendChild(script);
  // }

  // if (currentPath === "/reservacion/") {
  //   const script = document.createElement("script");
  //   script.type = "module";
  //   script.src =
  //     "/wp-content/themes/sailing-child-goctahotel/assets/js/reservacion.js";
  //   document.body.appendChild(script);
  // }
};

// Usar la función para cargar los scripts cuando el pathname coincida
window.addEventListener("DOMContentLoaded", loadScriptForPathname);
