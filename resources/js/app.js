/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';
import 'lity';
import { debounce } from 'underscore';

import Swiper, { Navigation } from 'swiper';

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

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

  $('.query-filters .filters').on('change', 'input[type="checkbox"]', debounce(tagFilters, 1500));

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

  $('.event-filters .filters').on('change', 'input[type="checkbox"]', debounce(eventFilters, 1250));

  function eventFilters() {
    var url = location.protocol + '//' + location.host + location.pathname,
    args = {};
  
    // loop over filters
    $('.event-filters .filters').each(function(){
      
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

    var time = getUrlParameter('time');
    //console.log(time);

    url += '?';

    if(time) {
      //console.log('got here')
      url += 'time=' + time + '&';

      $.each(args, function( name, value ){
        if(value) {
          url += name + '=' + value + '&';
        }
      });
    }
    else {

      // loop over args
      $.each(args, function( name, value ){
        if(value) {
          url += name + '=' + value + '&';
        }
      });

      // remove last &
      
    }

    url = url.slice(0, -1);
    
    //console.log(url);
    //console.log(url)
    // reload page
    window.location.replace( url );
  }

  

  $(document).on( 'click', '.pagination-container button', function( event ) {
		event.preventDefault();
		console.log( 'Clicked Link' );

    var page = $(this).attr("data-page");
    //console.log('Data page:' + page);
    load_posts(page);
	})

  
  function load_posts(page) {


    var time = getUrlParameter('time');
    var label = getUrlParameter('evlabel');
    var issue = getUrlParameter('evissue');
    //console.log(time);

    $.ajax({
      type: "POST",
      url: ajax_url.ajax_url,
      data: {
        action: "load_events",
        page: page,
        time: time,
        label: label,
        issue: issue,
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
          console.log(page)
          $('#event-prev').data("page", window.ajaxPage);

        }

      },
      error: function(req, e) {
        console.log(JSON.stringify(req));
      }
    })
  }

  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
  };

  $(document).on( 'click', '.event-filters .event-time-btn', function( event ) {
		event.preventDefault();
		//console.log( 'Clicked event-time' );

    var filter = $(this).attr("data-filter");
    var searchParams = new URLSearchParams(window.location.search);
    //console.log(params);

    searchParams.set('time', filter);

    //console.log(searchParams.toString());
    // if(searchParams) {
    //   var url = window.location.href + '&' + searchParams.toString();
    // }
    // else {
    //   var url = location.protocol + '//' + location.host + location.pathname + '?' + searchParams.toString();
    // }

    var url = location.protocol + '//' + location.host + location.pathname + '?' + searchParams.toString();

    
    //console.log(url)
    window.location.replace( url );
  });

  

  gsap.config({
    nullTargetWarn: false,
  });

  gsap.fromTo(".fade-up", {
    autoAlpha: 0,
      y: 25,
    }, {
    scrollTrigger: {
      trigger: '.wp-block-split-content',
      start: "0 75%",
      //markers: true,
    },
    autoAlpha: 1,
    y: 0,
    duration: 2,
  });

  // gsap.fromTo(".fade-up-contrib", {
  //   autoAlpha: 0,
  //     y: 25,
  //   }, {
  //   scrollTrigger: {
  //     trigger: '.fade-up-contrib',
  //     start: "0 50%",
  //     //markers: true,
  //   },
  //   autoAlpha: 1,
  //   y: 0,
  //   duration: 2,
  // });

});
