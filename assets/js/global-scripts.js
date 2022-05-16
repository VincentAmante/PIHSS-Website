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





// * Change header on scroll to hide when scrolled to top, and show when scrolled down 

// Gets height of the top header

// Updates constantly
window.onscroll = () => {scrollFunction()};
window.onload = () => {scrollFunction()};
window.onreset = () => {scrollFunction()};
window.onresize = () => {
  scrollFunction();
  // Update size on resize
  topHeaderHeight = document.getElementById('top-header').clientHeight + 5; 
}

function scrollFunction() {

  let topHeaderHeight = document.getElementById('top-header').clientHeight + 5;

  let burger = document.getElementById('burger');

  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    // document.getElementById("top-header").style.display = "flex";

    // Checks for a breakpoint before determining which element to hide/show
    // Needs a better way but currently adapts to mobile version
    if (window.innerWidth >= 768){
      console.log("Over 768");
      document.getElementById("header-content").style.transform = "translate(0,0)"
    } else {
      console.log("Under 768");
      document.getElementById("top-header").style.transform = "translate(0,0)"
    }

    if (burger.classList.contains("burger-alone")){
      burger.classList.remove("burger-alone");
    }
  } else {

    
    // document.getElementById("top-header").style.display = "none";
    if (window.innerWidth >= 768){
      document.getElementById("header-content").style.transform = 'translate(0,-' + topHeaderHeight + 'px)'
    } else {
      console.log("And of height");
      document.getElementById("top-header").style.transform = 'translate(0,-' + topHeaderHeight + 'px)'
    }


    if (!burger.classList.contains("burger-alone")){
      burger.classList.add("burger-alone");
    }
  }
}