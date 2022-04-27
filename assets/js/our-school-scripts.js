/* QUERY SELECTORS, VARIABLES */
const btnTab = document.querySelectorAll(".tab-button");
const headerTab = document.querySelectorAll(".tab-header");
const overviewTab = document.querySelectorAll(".tab-overview");
const contentTab = document.querySelectorAll(".tab-content");
var activeSection = "facilities";

/* FUNCTIONS */
const selectionHandler = (e) => {
  if (e == "btn-facilities") {
    activeSection = "facilities";
  } else if (e == "btn-co-curricular") {
    activeSection = "co-curricular";
  } else if (e == "btn-student-code") {
    activeSection = "student-code";
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
  document.querySelector("#" + activeSection + "-header").classList.add("active");
  document.querySelector("#" + activeSection + "-overview").classList.add("active");
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
