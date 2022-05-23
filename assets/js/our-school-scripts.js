/* QUERY SELECTORS, VARIABLES */
const btnTab = document.querySelectorAll(".tab-button");
const breadcrumbTab = document.querySelector(".tab-breadcrumb");
const headerTab = document.querySelectorAll(".tab-header");
const overviewTab = document.querySelectorAll(".tab-overview");
const contentTab = document.querySelectorAll(".tab-content");
var activeSection = "facilities";

/* FUNCTIONS */
const selectionHandler = (e) => {
  if (e == "btn-facilities") {
    activeSection = "facilities";
    breadcrumbTab.innerHTML = "FACILITIES";
  } else if (e == "btn-co-curricular") {
    activeSection = "co-curricular";
    breadcrumbTab.innerHTML = "CO-CURRICULAR ACTIVITIES";
  } else if (e == "btn-student-code") {
    activeSection = "student-code";
    breadcrumbTab.innerHTML = "STUDENT CODE OF BEHAVIOR";
  }

  removeActive();
  addActive(activeSection);
};

const removeActive = () => {
  for (i = 0; i < 3; i++) {
    headerTab[i].classList.remove("active");
    overviewTab[i].classList.remove("active");
    contentTab[i].classList.remove("active");
  }
};

const addActive = (activeSection) => {
  document
    .querySelector("#" + activeSection + "-header")
    .classList.add("active");
  document
    .querySelector("#" + activeSection + "-overview")
    .classList.add("active");
  document.querySelector("#" + activeSection).classList.add("active");

  // document.querySelector("#btn-" + activeSection).classList.add("selected");
};

/* EVENT LISTENERS */
btnTab.forEach((a) => {
  a.addEventListener("click", (e) => {
    e.stopPropagation();
    selectionHandler(e.currentTarget.id);
  });
});

//-------------------------------------------------

// Carousel Template
// - Imperfect but should be capable of adapting to all carousels
const createCarousel = (leftBtn, rightBtn, slider, rightOffset = 0) => {
  leftBtn = document.getElementById(leftBtn);
  rightBtn = document.getElementById(rightBtn);
  let elementWidth = document.getElementById(slider).children[0].clientWidth;
  slider = document.getElementById(slider);

  const scrollLeft = () => {
    if (slider.scrollLeft - elementWidth / 2 < 0){
      slider.insertBefore(slider.lastElementChild, slider.children[0]);
    }
    slider.scrollLeft -= elementWidth;
  }
  const scrollRight = () => {
    if ((slider.scrollLeft + slider.clientWidth + elementWidth) > slider.scrollWidth){

      // Smoothens out going to the right by ensuring scroll is not at maximum
      // - Not sure why this works
      if (rightOffset > 0){
        slider.scrollLeft -= elementWidth / rightOffset;
      }
      
      slider.insertBefore(slider.firstElementChild, slider.lastElementChild.nextSibling);
    }
    slider.scrollLeft += elementWidth;
  };

  leftBtn.onclick = () => {scrollLeft()};
  rightBtn.onclick = () => {scrollRight()};

  // slider.addEventListener('scroll', () => {
  //   if (slider.scrollLeft = 0) {scrollLeft()};
  //   if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth){scrollRight()};
  // })
}

// Why Pihss Slider
createCarousel('wp-btn-left', 'wp-btn-right', 'facilities-slider');