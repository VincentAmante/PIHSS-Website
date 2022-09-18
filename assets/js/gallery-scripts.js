/**
 * PURPOSE: Handle the lightbox functionality in the gallery pages (/gallery-subpages.php)
 *
 * CONTENT:
 *    - Handler for toggling the lightbox modal
 *    - Handler for switching between slides
 *    - Handlers for the header buttons (zoom in, zoom out, download)
 *    - Handler for the image drag functionality
 *    - Implementation of keyboard and touch functionality
 */

/*========== QUERY SELECTORS ==========*/

const lightboxEnabled = document.querySelectorAll(".lightbox-enabled");
const lightboxArray = Array.from(lightboxEnabled);
const lastImage = lightboxArray.length - 1;

// Lightbox header
const lightboxHeader = document.querySelector("#header");
const lightboxSlideNum = document.querySelector("#slide-number");
const lightboxBtnZoomIn = document.querySelector("#zoom-in");
const lightboxBtnZoomOut = document.querySelector("#zoom-out");
const lightboxBtnClose = document.querySelector("#close");
const lightboxBtnDownload = document.querySelector("#download");

// Lightbox content
const lightboxContainer = document.querySelector(".modal");
const lightboxSlide = document.querySelector(".lightbox-slide");
const lightboxImage = document.querySelector(".lightbox-image");

// Previous, Next buttons
const lightboxBtns = document.querySelectorAll(".lightbox-btn");
const lightboxBtnPrev = document.querySelector("#prev");
const lightboxBtnNext = document.querySelector("#next");

let activeImage;
let changeZoom = 1;
var state = { distX: 0, distY: 0 };
var flag = false;

/*========== FUNCTIONS ==========*/

// Functions to toggle lightbox
const showLightBox = () => {
	document.querySelector("body").style.overflow = "hidden";
	lightboxContainer.classList.add("active");
	lightboxImage.style.transform = "scale(1)";
	lightboxImage.style.cursor = "grab";
	lightboxHeader.style.display = "none";
	lightboxSlide.style.pointerEvents = "initial";
};

const hideLightBox = () => {
	document.querySelector("body").style.overflow = "auto";
	lightboxContainer.classList.remove("active");
	lightboxImage.style.transform = "scale(0.5)";
	lightboxImage.style.cursor = "default";
	lightboxHeader.style.display = "flex";
};

// Functions for slide handling
const setActiveImage = (image) => {
	lightboxImage.style.transform = "scale(1)";
	lightboxSlide.style.transform = "none";
	lightboxSlide.style.transition = "0.4s ease-in-out";
	changeZoom = 1;

	lightboxImage.src = image.dataset.imagesrc;
	activeImage = lightboxArray.indexOf(image);

	lightboxSlideNum.innerHTML = activeImage + 1 + " / " + lightboxArray.length;
};

const transitionSlidePrev = () => {
	activeImage === 0
		? setActiveImage(lightboxArray[lastImage])
		: setActiveImage(lightboxArray[activeImage - 1]);
};

const transitionSlideNext = () => {
	activeImage === lastImage
		? setActiveImage(lightboxArray[0])
		: setActiveImage(lightboxArray[activeImage + 1]);
};

const transitionSlideHandler = (moveItem) => {
	moveItem.includes("prev") ? transitionSlidePrev() : transitionSlideNext();
};

// Function to download image
const downloadSlide = (image) => {
	lightboxBtnDownload.href = lightboxArray[image].src;
};

// Function to change image zoom
const zoomSlide = (changeZoom) => {
	console.log(changeZoom);
	lightboxImage.style.transform = "scale(" + changeZoom + ")";
};

// Functions for dragging images
const dragDown = (e) => {
	// Prevent unexpected behaviors on mobile devices
	e.preventDefault();

	// Get the correct event source regardless the device:
	var evt = e.type === "touchstart" ? e.changedTouches[0] : e;

	// Get the size of the slide
	const rect = lightboxSlide.getBoundingClientRect();

	// Get the distance of the x/y
	state.distX = Math.abs(rect.left - evt.clientX);
	state.distY = Math.abs(rect.top - evt.clientY);

	flag = true;
	lightboxSlide.style.transition = "0s";
	lightboxImage.style.cursor = "grabbing";
};

const dragUp = (e) => {
	flag = false;
	lightboxImage.style.cursor = "grab";
};

const dragMove = (e) => {
	// Update the position x/y
	if (flag === true) {
		// Get the correct event source regardless the device:
		var evt = e.type === "touchmove" ? e.changedTouches[0] : e;

		// Translate container to new position
		lightboxSlide.style.transform = `translate(
			${evt.clientX - state.distX}px,
			${evt.clientY - state.distY}px)`;
	}
};

/*========== EVENT LISTENERS ==========*/

// Click input
lightboxEnabled.forEach((image) => {
	image.addEventListener("click", (e) => {
		showLightBox();
		setActiveImage(image);
	});
});

lightboxBtns.forEach((btn) => {
	btn.addEventListener("click", (e) => {
		e.stopPropagation();
		transitionSlideHandler(e.currentTarget.id);
	});
});

[lightboxBtnZoomIn, lightboxBtnZoomOut].forEach((btn) => {
	btn.addEventListener("click", (e) => {
		changeZoom = Math.round(changeZoom * 10) / 10;

		if (e.currentTarget.id.includes("zoom-in")) {
			console.log("zoom in");
			if (changeZoom < 3) {
				changeZoom += 0.2;
			}
		} else if (e.currentTarget.id.includes("zoom-out")) {
			console.log("zoom out");
			if (changeZoom > 0.2) {
				changeZoom -= 0.2;
			}
		}

		zoomSlide(changeZoom);
	});
});

lightboxBtnClose.addEventListener("click", () => {
	hideLightBox();
});

lightboxBtnDownload.addEventListener("click", () => {
	downloadSlide(activeImage);
});

// Keyboard input
window.addEventListener("keydown", (e) => {
	console.log(e.key);

	if (e.key.includes("Left") || e.key.includes("Right")) {
		e.preventDefault();
		transitionSlideHandler(e.key.toLowerCase());
	}

	if (e.key.includes("Esc")) {
		hideLightBox();
	}
});

// Image drag input
// FOR MOUSE DEVICES:
lightboxImage.addEventListener("mousedown", dragDown);
lightboxContainer.addEventListener("mousemove", dragMove);
lightboxContainer.addEventListener("mouseup", dragUp);

// FOR TOUCH DEVICES:
lightboxImage.addEventListener("touchstart", dragDown);
lightboxContainer.addEventListener("touchmove", dragMove);
lightboxContainer.addEventListener("touchend", dragUp);
