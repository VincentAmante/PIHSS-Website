// Handles the burger menu
const burger = document.querySelector(".burger");
const nav = document.querySelector("nav");

const navSlide = () => {
  const navLinks = document.querySelectorAll(".nav-links li");

  // Toggles navigation to be active when the burger is clicked
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

/**
 * Creates a 'infinite' carousel based on provided width and buttons
 *    - Main requirements:
 *        - Slider already contains all elements for scrolling through
 *        - All elements are of the same width
 * 
 * @param {*} leftBtn - button to scroll left
 * @param {*} rightBtn - button to scroll right
 * @param {*} slider - container of elements to scroll through, width and first child is used as measurement for scrolling through
 * @param {*} rightOffset - Default 0: A value greater than 0 offsets the children's width by a percentage (1 = 100% of width)
 */
function createCarousel(leftBtn, rightBtn, slider, rightOffset = 0) {
  leftBtn = document.getElementById(leftBtn);
  rightBtn = document.getElementById(rightBtn);
  let elementWidth = document.getElementById(slider).children[0].clientWidth;
  slider = document.getElementById(slider);

  const scrollLeft = () => {
    if (slider.scrollLeft - elementWidth / 2 < 0) {
      slider.insertBefore(slider.lastElementChild, slider.children[0]);
    }
    slider.scrollLeft -= elementWidth;
  };
  const scrollRight = () => {
    if ((slider.scrollLeft + slider.clientWidth + elementWidth) > slider.scrollWidth) {

      // Smoothens out going to the right by ensuring scroll is not at maximum
      if (rightOffset > 0) {
        slider.scrollLeft -= elementWidth / rightOffset;
      }

      slider.insertBefore(slider.firstElementChild, slider.lastElementChild.nextSibling);
    }
    slider.scrollLeft += elementWidth;
  };

  leftBtn.onclick = () => { scrollLeft(); };
  rightBtn.onclick = () => { scrollRight(); };
}