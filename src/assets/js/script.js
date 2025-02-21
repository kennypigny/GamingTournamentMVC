//ANIMATION ICON HAMBURGER & SIDENAVBAR HIDEN / VISIBLE
const btn = document.querySelector(".btn-1");
const sideNavbar = document.querySelector(".navbar-side");

btn.addEventListener("click", () => {
  btn.classList.toggle("active");
  sideNavbar.classList.toggle("visible");
});
