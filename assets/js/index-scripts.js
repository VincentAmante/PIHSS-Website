// Why-Pihss Slider Code
const wp_left = document.getElementById('wp-btn-left');
const wp_right = document.getElementById('wp-btn-right');
const wp_slider = document.getElementById('why-pihss-slider');

wp_left.onclick = () => {
  wp_slider.scrollLeft -= (wp_slider.scrollWidth / 3);
  if (wp_slider.scrollLeft - document.body.clientWidth * .6 < 0){
    wp_slider.scrollLeft = wp_slider.scrollWidth;
  }
};
wp_right.onclick = () => {
  wp_slider.scrollLeft += (wp_slider.scrollWidth / 3);
  if ((wp_slider.scrollLeft + document.body.clientWidth * .7) > wp_slider.scrollWidth){
    wp_slider.scrollLeft = 0;
  }
};

// AAC Slider Code
const aac_left = document.getElementById('aac-btn-left');
const aac_right = document.getElementById('aac-btn-right');
const aac_slider = document.getElementById('aac-slider');

aac_left.onclick = () => {
  aac_slider.scrollLeft -= (aac_slider.scrollWidth / 6);
  console.log(aac_slider.scrollLeft - (aac_slider.scrollWidth / 6) < 0);

  if (aac_slider.scrollLeft - (aac_slider.scrollWidth / 6) < 0){
    aac_slider.scrollLeft = aac_slider.scrollWidth;
  }
};
aac_right.onclick = () => {
  aac_slider.scrollLeft += (aac_slider.scrollWidth / 6);

  if ((aac_slider.scrollLeft + document.body.clientWidth * .7) > aac_slider.scrollWidth){
    aac_slider.scrollLeft = 0;
  }
};
