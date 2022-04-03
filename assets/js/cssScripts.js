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

// AAC-Slider Code
// TODO: Move to its own file
const prev = document.getElementById('aac-btn-left');
const next = document.getElementById('aac-btn-right');
const slider = document.querySelector('.slider');
let step;

next.addEventListener('click' , () => {
  step = 1 ;
  slider.style.transform = 'translateX(-240px)'
})

prev.addEventListener('click' , async () => {
  step = -1 ;
  slider.style.transition = await 'none';
  slider.prepend(slider.lastElementChild);
  slider.style.transform = 'translateX(-240px)'
  setTimeout(async () => {
    slider.style.transition = await '.3s ease-in-out';
    slider.style.transform = 'translateX(0)'
  })
})

slider.addEventListener('transitionend' , async () => {
  if (step === 1) {
    
    slider.style.transition = await 'none';
    slider.append(slider.firstElementChild);
    slider.style.transform  = await 'translateX(0)';
    setTimeout(() => {
      slider.style.transition = '.3s ease-in-out';
    })
  }
})