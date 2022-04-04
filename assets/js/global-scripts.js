// This is code for handling the burger menu
const burger = document.querySelector(".burger");
const nav = document.querySelector("nav");

const navSlide = () => {
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

// Clicks out
document.addEventListener('click', function(event) {
  var clickedNav = nav.contains(event.target);
  var clickedBurger = burger.contains(event.target);

  if (!clickedNav && !clickedBurger) {
    nav.classList.remove("nav-active")
  }
});

// Change header on scroll 
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("top-header").style.display = "flex";
  } else {
    document.getElementById("top-header").style.display = "none";
  }
}