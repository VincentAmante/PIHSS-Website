// This is code for handling the burger menu
// TODO: Re-do if needed

const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector("nav");
  const navLinks = document.querySelectorAll(".nav-links li");

  burger.addEventListener("click", () => {
    // Toggles Nav
    nav.classList.toggle("nav-active");

    // Animates link arrival
    navLinks.forEach((link, index) => {
      if (link.style.animtion) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7}s`;
      }
    });

    // Burger Animation
    burger.classList.toggle("toggle");
  });
};

navSlide();
