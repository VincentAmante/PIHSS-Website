// /* QUERY SELECTORS, VARIABLES */
const breadcrumbTab = document.querySelector(".tab-breadcrumb");
const headerTab = document.querySelectorAll(".tab-header");
const overviewTab = document.querySelectorAll(".tab-overview");
const contentTab = document.querySelectorAll(".tab-content");
const subpageBanner = document.querySelector(".subpage-banner");
var activeSection;

const selectionHandler = (e) => {
	if (e) {
		const sectionID = e.substring(1);

		if (sectionID == "facilities") {
			activeSection = "facilities";
		} else if (sectionID == "co-curricular") {
			activeSection = "co-curricular";
		} else if (sectionID == "study-programme") {
			activeSection = "study-programme";
		} else if (sectionID == "student-code") {
			activeSection = "student-code";
		} else {
			activeSection = "facilities";
		}
	} else {
		activeSection = "facilities";
	}

	breadcrumbTab.innerHTML = activeSection;
	breadcrumbTab.href = "our-school.html#" + activeSection;

	removeActive();
	addActive(activeSection);
};

const removeActive = () => {
	for (i = 0; i < 4; i++) {
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
};

/* EVENT LISTENERS */

window.addEventListener("hashchange", function () {
	selectionHandler(window.location.hash);
});

//-------------------------------------------------

// Why Pihss Slider
createCarousel("wp-btn-left", "wp-btn-right", "facilities-slider");
