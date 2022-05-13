// Jquery Inclusion
// var script = document.createElement('script');

// // Update src when possible
// script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';

// script.type = 'text/javascript';
// document.getElementsByTagName('head')[0].appendChild(script);

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

// Gets height of the top header
var topHeaderHeight = document.getElementById('top-header').clientHeight + 5;

// Change header on scroll to hide when scrolled to top, and show when scrolled down 
window.onscroll = () => {scrollFunction()};
window.onload = () => {scrollFunction()};
window.onresize = () => {
  scrollFunction();
  topHeaderHeight = document.getElementById('top-header').clientHeight + 5; 
}
window.onreset = () => {scrollFunction()};

function scrollFunction() {
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