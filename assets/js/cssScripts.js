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


// Horizontal Scroll
const scroll = document.querySelector(".scroll");
var isDown = false;
var scrollX;
var scrollLeft;

// Mouse Up Function
scroll.addEventListener("mouseup", () => {
	isDown = false;
	scroll.classList.remove("active");
});

// Mouse Leave Function
scroll.addEventListener("mouseleave", () => {
	isDown = false;
	scroll.classList.remove("active");
});

// Mouse Down Function
scroll.addEventListener("mousedown", (e) => {
	e.preventDefault();
	isDown = true;
	scroll.classList.add("active");
	scrollX = e.pageX - scroll.offsetLeft;
	scrollLeft = scroll.scrollLeft;
});

// Mouse Move Function
scroll.addEventListener("mousemove", (e) => {
	if (!isDown) return;
	e.preventDefault();
	var element = e.pageX - scroll.offsetLeft;
	var scrolling = (element - scrollX) * 2;
	scroll.scrollLeft = scrollLeft - scrolling;
});


// AAC-Slider Code
var aac_indexValue = 1;
aac_showImg(aac_indexValue);
function aac_side_slide(e){showImg(aac_indexValue += e);}
function aac_showImg(e){
  var i;
  const img = document.querySelectorAll('img');
  const sliders = document.querySelectorAll('.aac-slider ul li');
  console.log(sliders);
}