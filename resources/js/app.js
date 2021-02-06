/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';
import 'lity';
import Swiper, { Navigation } from 'swiper';

Swiper.use([Navigation]);

$(document).ready(() => {
  // console.log('Hello world');
  const taxSwiper = new Swiper('.tax-slider', {
    slidesPerView: 'auto',
    grabCursor: true,
    freeMode: true,
    freeModeSticky: true,
    slidesOffsetAfter: 48,
    spaceBetween: 24,
    navigation: {
      nextEl: '.tax-btn-next',
      prevEl: '.tax-btn-prev',
    },
    breakpoints: {
      640: {
        spaceBetween: 32,
        slidesOffsetAfter: 64,
      },
      1024:  {
        spaceBetween: 48,
        slidesOffsetAfter: 48,
      }
    }
  });

});
