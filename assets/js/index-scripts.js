// Why-Pihss Slider Code
const wp_left = document.getElementById('wp-btn-left');
const wp_right = document.getElementById('wp-btn-right');
const wp_slider = document.getElementById('why-pihss-slider');

wp_left.onclick = () => {
  wp_slider.scrollLeft -= (wp_slider.scrollWidth / 4);
};
wp_right.onclick = () => {
  wp_slider.scrollLeft += (wp_slider.scrollWidth / 4);
};

// AAC Slider Code
const aac_left = document.getElementById('aac-btn-left');
const aac_right = document.getElementById('aac-btn-right');
const aac_slider = document.getElementById('aac-slider');

aac_left.onclick = () => {
  aac_slider.scrollLeft -= (aac_slider.scrollWidth / 6);
};
aac_right.onclick = () => {
  aac_slider.scrollLeft += (aac_slider.scrollWidth / 6);
};

