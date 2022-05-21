
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
createCarousel('wp-btn-left', 'wp-btn-right', 'why-pihss-slider');

// Administrative Affairs Slider
createCarousel('aac-btn-left', 'aac-btn-right', 'aac-slider', 3);

// More Info Paginator
// TODO: Automate this lmfao
const mi_slider = document.getElementById('more-info-selection');
const mi_slider_max = mi_slider.children.length + 1;
document.getElementById('paginator-1').onclick = () => {
  console.log('registered click')
  console.log(mi_slider.scrollLeft)
  mi_slider.scrollLeft = 0;
}
document.getElementById('paginator-2').onclick = () => {
  mi_slider.scrollLeft = (mi_slider.scrollWidth / mi_slider_max) ;
}
document.getElementById('paginator-3').onclick = () => {
  mi_slider.scrollLeft = (mi_slider.scrollWidth / mi_slider_max) * 2 ;
}
document.getElementById('paginator-4').onclick = () => {
  mi_slider.scrollLeft = (mi_slider.scrollWidth / mi_slider_max) * 3 ;
}


// Counter

const createCounter = (counter_id) => {
  let counter = document.getElementById(counter_id)
  let count = 0
  
  const countUp = setInterval(() => {
    let numCount = counter.dataset.count
    if(count == numCount) clearInterval(countUp)
    counter.innerHTML = count + counter.dataset.unit

    if (numCount >= 10){
      count = count + Math.floor((numCount/50))
    }
    else {
      count = numCount;
    }
    if(count > numCount) count = numCount
  }, 20)
}

createCounter("building-count");
createCounter("classroom-count");
createCounter("employee-count");
createCounter("alumni-count");
