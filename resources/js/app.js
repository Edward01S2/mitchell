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

  if ( typeof tribe_events_calendar_ajax_post == 'function' ) {
    tribe_events_calendar_ajax_post();
  }

  $('.query-filters .filters').on('change', 'input[type="checkbox"]', debounce(tagFilters, 1250));

  function tagFilters() {
    var url = location.protocol + '//' + location.host + location.pathname,
    args = {};

    url = url.split('page/')[0];
    
  
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

  var ajaxPage = 1;

  $(document).on( 'click', '.pagination-container button', function( event ) {
		event.preventDefault();
		console.log( 'Clicked Link' );

    var page = $(this).attr("data-page");
    //console.log('Data page:' + page);
    load_posts(page);
	})

  // $(document).on( 'click', '.pagination-container #event-next', function( event ) {
	// 	event.preventDefault();
	// 	console.log( 'Clicked Link' );

  //   var page = $('.pagination-container #event-next').attr("data-page");
  //   console.log('Data page:' + page);
  //   load_posts(page);
	// })

  
  function load_posts(page) {

    // var url = location.protocol + '//' + location.host + location.pathname;

    // url += '?';
    // url += 'page' + '=' + page + '&';

    // url = url.slice(0, -1);

    // window.location.replace( url );


    $.ajax({
      type: "POST",
      url: ajax_url.ajax_url,
      data: {
        action: "load_events",
        page: page,
        //cat: $(this).val()
      },
      beforeSend: function() {
        // $("#course-grid-container").html(" ");
        // $("#loading-anim").show();
      },
      complete: function() {
        // $("#loading-anim").hide();
      },
      success: function(response) {
        //console.log(JSON.stringify(response));
        if(response) { 
          $('.posts-ajax-wrapper').html(response.data['response']);

          var page = parseInt(response.data['page']);
          console.log(page)
          if(page > 1 && page !== 9999) {
            $('.pagination-container #event-prev').attr("data-page", page + 1);
            $('.pagination-container #event-next').attr("data-page", page - 1);
            $('.pagination-container #event-next').show();
          }
          if(page == 1) {
            $('.pagination-container #event-next').hide();
          }
          if(page === 9999) {
            $('.pagination-container #event-prev').hide();
          }

          $('html,body').animate({scrollTop: $("#event-title").offset().top},'slow');
          //console.log(page)
          // $('#event-prev').data("page", window.ajaxPage);
        }
        // $("#course-grid-cat").show();
        // $("#course-grid-container").append(data);
      },
      error: function(req, e) {
        console.log(JSON.stringify(req));
      }
    })
  }


 });
