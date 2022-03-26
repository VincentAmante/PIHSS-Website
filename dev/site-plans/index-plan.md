# Index-Plan

- **NOTE:** Ditch the desktop view for now, focus on mobile since the prototype for it is already there

## Hero Banner

- Nothing too complex, `display: flex` and `flex-direction: column` should be enough for this in both mobile and desktop view
- Think about the styling
- Perhaps a slideshow element will be implemented, look into codepens for this

## About Us

- Mobile view needs to be implemented first before we go with the desktop shenanigans
- Best idea is to use `transform: scale` on the image to go over the green stripe
- The stat-block might be better off being `position: relative`
  - though first check if it can go over the image, another way of styling may be better

## History

- Implementation of Pagination -> [Sample Link](https://codepen.io/bcarvalho/pen/WXmwBq)
  - Look into this not just for pagination but also examples of how it can be applied to the gallery stuff
- Everything else is simple to style

## Why PIHSS?

- Implementation of Scrolling thing:
  - [Lightbox Method](https://codepen.io/ind88/pen/MzoKzP?css-preprocessor=none) - Figure out how to modify this
- Staggered grid-like layout on desktop, flexbox or grid?
  - Likely flexbox due to that offset
- Might need to use `position: relative` or `absolute` to go over the yellow stripe again

## Administrative Affairs Committee (AAC)

- Refer to the same code as in **WHY PISS**
- Animation might need to be implemented for the scrolling of the staff

## News and Events

- Everything you need here should be found by working from earlier works already
