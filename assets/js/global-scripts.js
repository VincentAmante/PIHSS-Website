// This is code for handling the burger menu
const burger = document.querySelector(".burger");
const nav = document.querySelector("nav");

const navSlide = () => {
  const navLinks = document.querySelectorAll(".nav-links li");

  // Toggles navigation to bea ctive when the burger is clicked
  burger.addEventListener("click", () => {
    // Toggles Nav
    nav.classList.toggle("nav-active");
    burger.classList.toggle("toggle");

    // Animates link arrival
    navLinks.forEach((link, index) => {
      if (link.style.animtion) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7}s`;
      }
    });

  });
};

navSlide();

// Turns side navigation off when clicking outside the navigation and the burger
document.addEventListener('click', function(event) {
  var clickedNav = nav.contains(event.target);
  var clickedBurger = burger.contains(event.target);

  if (!clickedNav && !clickedBurger) {
    nav.classList.remove("nav-active");
    burger.classList.remove("toggle");
  }
});