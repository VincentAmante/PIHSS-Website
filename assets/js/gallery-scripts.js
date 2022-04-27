/* QUERY SELECTORS */
const lightboxEnabled = document.querySelectorAll(".lightbox-enabled");
const lightboxArray = Array.from(lightboxEnabled);
const lastImage = lightboxArray.length - 1;

// Lightbox header
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

/* FUNCTIONS */
const showLightBox = () => {
  lightboxContainer.classList.add("active");
  document.querySelector("body").style.overflow = "hidden";
  document.querySelector(".lightbox-slide").style.cursor = "grab";
  document.querySelector("#header").style.display = "none";
};

const hideLightBox = () => {
  lightboxContainer.classList.remove("active");
  document.querySelector("body").style.overflow = "auto";
  document.querySelector(".lightbox-slide").style.cursor = "default";
  document.querySelector("#header").style.display = "flex";
};

const setActiveImage = (image) => {
  lightboxImage.style.transform = "scale(1)";
  lightboxSlide.style.transform = "none";
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

const downloadSlide = (image) => {
  lightboxBtnDownload.href = lightboxArray[image].src;
};

const zoomSlide = (changeZoom) => {
  console.log(changeZoom);
  lightboxImage.style.transform = "scale(" + changeZoom + ")";
};

/* EVENT LISTENERS */
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

// -----------------------------
// IMAGE PANNING
// TODO: Fix awkward behavior
// TODO: Organise code

// Distance between last and new position
var state = { distX: 0, distY: 0 };

function onDown(e) {
  // Stop bubbling, this is important to avoid
  // unexpected behaviours on mobile browsers:
  e.preventDefault();

  // Get the correct event source regardless the device:
  var evt = e.type === "touchstart" ? e.changedTouches[0] : e;

  // Get the distance of the x/y
  state.distX = Math.abs(lightboxSlide.offsetLeft - evt.clientX);
  state.distY = Math.abs(lightboxSlide.offsetTop - evt.clientY);

  // Disable pointer events in the circle to avoid
  // a bug whenever it's moving.
  lightboxSlide.style.pointerEvents = "none";
}
function onUp(e) {
  // Re-enable the "pointerEvents" in the circle element.
  // If this is not enabled, then the element won't move.
  lightboxSlide.style.pointerEvents = "initial";
}
function onMove(e) {
  // Update the position x/y
  if (lightboxSlide.style.pointerEvents === "none") {
    // Get the correct event source regardless the device:
    var evt = e.type === "touchmove" ? e.changedTouches[0] : e;

    // Update top/left directly in the dom element:
    lightboxSlide.style.transform = `translate(${
      evt.clientX - state.distX
    }px, ${evt.clientY - state.distY}px)`;
  }
}

// FOR MOUSE DEVICES:
lightboxSlide.addEventListener("mousedown", onDown);
lightboxContainer.addEventListener("mousemove", onMove);
lightboxContainer.addEventListener("mouseup", onUp);

// FOR TOUCH DEVICES:
lightboxContainer.addEventListener("touchmove", onMove);