/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';
import 'lity';
import { debounce } from 'underscore';
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

  $('.query-filters .filters').on('change', 'input[type="checkbox"]', debounce(tagFilters, 1250));

  function tagFilters() {
    var url = location.protocol + '//' + location.host + location.pathname,
    args = {};
    
  
    // loop over filters
    $('.query-filters .filters').each(function(){
      
      // vars
      var filter = $(this).data('filter');
      var vals = [];

      //console.log(filter)
        
      // find checked inputs
      $(this).find('input:checked').each(function(){
        
        //console.log($(this).val())
        vals.push( $(this).val() );
      });
      
      //console.log(vals)
      
      // append to args
      args[ filter ] = vals.join(',');
      //console.log(args)
    });

    //console.log(args)

    //if(args[ filter ] !== "") {
      // update url
      url += '?';

      // loop over args
      $.each(args, function( name, value ){
        if(value) {
          url += name + '=' + value + '&';
        }
      });

      // remove last &
      url = url.slice(0, -1);
    

    //console.log(url)
    // reload page
   window.location.replace( url );
  }


 });
