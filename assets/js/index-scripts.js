

// Why Pihss Slider
createCarousel('wp-btn-left', 'wp-btn-right', 'why-pihss-slider', 2);
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


const fadeSlider = (cardClassName, containerName) => {
  let card = document.getElementsByClassName(cardClassName); //grabs all the elements with .card class
  let container = document.getElementsByClassName(containerName)[0]; //grabs the div with .second-container class

  function isInViewport(el) {
    let result = [];
    for (var i = 0; i < el.length; i++) {
      const rect = el[i].getBoundingClientRect();
      // console.log(i, el.length);
      result.push(
        rect.left >= 0 &&
          rect.right <=
            (window.innerWidth || document.documentElement.clientWidth)
      ); // checks whether a div with the .card class is out of the viewport and stores the value in result[]
    }
    return result; // returns an array of boolean values for each element with .card class
  }

  container.addEventListener("scroll", function () {
    //listens to scroll event inside second-container
    const result = isInViewport(card);
    for (var i = 0; i < result.length; i++) {
      // Below code adds/removes .card-inactive class
      if (!result[i]) {
        card[i].classList.add("card-inactive");
      } else card[i].classList.remove("card-inactive");
    }
  });
}

// * Change header on scroll to hide when scrolled to top, and show when scrolled down 

// Gets height of the top header

// Updates constantly
window.onscroll = () => {scrollFunction()};
window.onload = () => {scrollFunction()};
window.onreset = () => {scrollFunction()};
window.onresize = () => {
  scrollFunction();
  // Update size on resize
  topHeaderHeight = document.getElementById('top-header').clientHeight + .25; 
}

function scrollFunction() {
  let topHeaderHeight = document.getElementById('top-header').clientHeight + .25;
  let burger = document.getElementById('burger');

  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    // document.getElementById("top-header").style.display = "flex";

    // Checks for a breakpoint before determining which element to hide/show
    // Needs a better way but currently adapts to mobile version
    if (window.innerWidth >= 768){
      console.log("Over 768");
      document.getElementById("header-content").style.transform = "translate(0,0)"
    } else {
      console.log("Under 768");
      document.getElementById("top-header").style.transform = "translate(0,0)"
    }

    // Changes colour of burger based on whether there is header or not
    if (burger.classList.contains("burger-alone")){
      burger.classList.remove("burger-alone");
    }


  } else {

    // document.getElementById("top-header").style.display = "none";
    if (window.innerWidth >= 768){
      document.getElementById("header-content").style.transform = 'translate(0,-' + topHeaderHeight + 'px)'
    } else {
      console.log("And of height");
      document.getElementById("top-header").style.transform = 'translate(0,-' + topHeaderHeight + 'px)'
    }


    if (!burger.classList.contains("burger-alone")){
      burger.classList.add("burger-alone");
    }
  }
}