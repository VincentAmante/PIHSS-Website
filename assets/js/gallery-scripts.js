/* QUERY SELECTORS */
const lightboxEnabled = document.querySelectorAll(".lightbox-enabled");
const lightboxArray = Array.from(lightboxEnabled);
const lastImage = lightboxArray.length -1;

// Lightbox header 
const lightboxSlideNum = document.querySelector("#slide-number");
const lightboxBtnClose = document.querySelector("#close");
const lightboxBtnDownload = document.querySelector("#download");

// Lightbox content
const lightboxContainer = document.querySelector(".modal");
const lightboxImage = document.querySelector(".lightbox-image");

// Previous, Next buttons
const lightboxBtns = document.querySelectorAll(".lightbox-btn");
const lightboxBtnPrev = document.querySelector("#prev");
const lightboxBtnNext = document.querySelector("#next");

let activeImage;

/* FUNCTIONS */
const showLightBox = () => {
  lightboxContainer.classList.add("active");
  document.querySelector("body").style.overflow = "hidden";
};

const hideLightBox = () => {
  lightboxContainer.classList.remove("active");
  document.querySelector("body").style.overflow = "auto";
};

const setActiveImage = (image) => {
  lightboxImage.src = image.dataset.imagesrc;
  activeImage = lightboxArray.indexOf(image);

  lightboxSlideNum.innerHTML = (activeImage + 1) + " / " + lightboxArray.length;
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

/* EVENT LISTENERS */
// Click input
lightboxEnabled.forEach((image) => {
  image.addEventListener("click", (e) => {
    showLightBox();
    setActiveImage(image);
  });
});

[lightboxContainer, lightboxBtnClose].forEach((btn) => {
  btn.addEventListener("click", () => {
  hideLightBox()
  });
});

lightboxBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    transitionSlideHandler(e.currentTarget.id);
  });
});

lightboxBtnDownload.addEventListener("click", () => {
  downloadSlide(activeImage);
});

// Keyboard input
window.addEventListener('keydown', (e) => {
  console.log(e.key)

  if(e.key.includes('Left') || e.key.includes('Right')) {
    e.preventDefault();
    transitionSlideHandler(e.key.toLowerCase());
  }

  if(e.key.includes('Esc')) {
    hideLightBox();
  }
})

