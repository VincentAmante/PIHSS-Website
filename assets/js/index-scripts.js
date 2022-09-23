/**
 * PURPOSE: Handles various code to be used in the landing page (index.php)
 * 
 * CONTENT: 
 *    - handlers for More Info Slider (w/ Paginator)
 *    - counters for the About us section
 *    - handler for hiding the header when scrollong to top of page
 */

// Why Pihss Slider
createCarousel('wp-btn-left', 'wp-btn-right', 'why-pihss-slider', 1.25);
// Administrative Affairs Slider
createCarousel('aac-btn-left', 'aac-btn-right', 'aac-slider', 3);


// More Info Slider
let miSlider = $('#more-info-selection');
let miSliderMax = $(miSlider).children().length + 1;

// On clicking each paginator button, scrolls slider to the corresponding element
$('.paginator-item').each((index, obj)=>{

  $(obj).addClass('paginator-item-' + index);
  $(obj).click(()=>{
    $(miSlider).scrollLeft(($(miSlider)[0].scrollWidth / miSliderMax) * index);
  })
})
// Sets default to scroll to beginning
$(miSlider).scrollLeft(0);


// Counter that counts up on page load
// ! Does not start when scrolled on, but at page load. Feature will likely be missed
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


//// * Change header on scroll to hide when scrolled to top, and show when scrolled down 
// Update on following events:
window.onscroll = () => {scrollFunction()};
window.onload = () => {scrollFunction()};
window.onreset = () => {scrollFunction()};

var mobileEdited = false;
var desktopEdited = false;
window.onresize = () => {
  scrollFunction();
  // Update size on resize
  topHeaderHeight = document.getElementById('top-header').clientHeight + .25;

  // Breakpoints determine which part of header is hidden
  // When user switches breakpoints, the hidden portion is reset to prevent issues
  if (mobileEdited && window.innerWidth >= 768){
    document.getElementById("top-header").style.transform = "translate(0,0)"
  } 
  else if (desktopEdited && window.innerWidth<768){
    document.getElementById("header-content").style.transform = "translate(0,0)";
  }
}

function scrollFunction() {
  let topHeaderHeight = document.getElementById('top-header').clientHeight + .25;
  let burger = document.getElementById('burger');

  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    // Checks for a breakpoint before determining which element to hide/show
    // Needs a better way but currently adapts to mobile version
    if (window.innerWidth >= 768){
      document.getElementById("header-content").style.transform = "translate(0,0)";
      desktopEdited = false;
    } else {
      document.getElementById("top-header").style.transform = "translate(0,0)"
      mobileEdited = false;
    }
    // Changes colour of burger based on whether there is header or not
    if (burger.classList.contains("burger-alone")){
      burger.classList.remove("burger-alone");
    }
  } else {
    // document.getElementById("top-header").style.display = "none";
    if (window.innerWidth >= 768){
      document.getElementById("header-content").style.transform = 'translate(0,-' + topHeaderHeight + 'px)';
      desktopEdited = true;
    } else {
      document.getElementById("top-header").style.transform = 'translate(0,-' + topHeaderHeight + 'px)';
      mobileEdited = true;
    }
    if (!burger.classList.contains("burger-alone")){
      burger.classList.add("burger-alone");
    }
  }
}