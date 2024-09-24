document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.getElementById("menu-btn");
  const menu = document.getElementById("menu");

  menuBtn.addEventListener("click", function () {
    const isExpanded = menuBtn.getAttribute("aria-expanded") === "true";
    menuBtn.setAttribute("aria-expanded", !isExpanded);

    // Alterna entre las clases de animación
    if (isExpanded) {
      // Ocultar el menú
      menu.classList.remove("menu-visible");
      menu.classList.add("menu-hidden");
    } else {
      // Mostrar el menú
      menu.classList.remove("menu-hidden");
      menu.classList.add("menu-visible");
    }
  });
});
