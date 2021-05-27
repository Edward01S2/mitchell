<?php

/**
 * Theme helpers.
 */

namespace App;

use function Roots\view;

$GLOBALS['query_filters'] = array( 
	'label'	=> 'label', 
  'issue'	=> 'issue',
  'author' => 'author',
  'resource' => 'resource',
);


add_action('pre_get_posts', function($query) {

  // bail early if is in admin
	if( is_admin() ) return;
	
	
	// bail early if not main query
	// - allows custom code / plugins to continue working
  if( !$query->is_main_query() ) return;

  

  $tags = get_terms('label', [
      'hide_empty' => false,
  ]);


  	// loop over filters
	foreach( $GLOBALS['query_filters'] as $key => $name ) {
		
    // continue if not found in url
		if( empty($_GET[ $name ]) ) {
			
			continue;
			
		}
		
		
		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);
		
		//print_r($value);
		// append meta query

    if(isset($value) && $value) :

      if(isset($_GET['label'])):
        $query->set('tax_query', array(
          array(
            'taxonomy'		=> 'label',
            'field'		=> 'slug',
            'terms'	=> $value,
          )
        ));
      endif;
  
      if(isset($_GET['issue'])):
        $query->set('tax_query', array(
          array(
            'taxonomy'		=> 'issue',
            'field'		=> 'slug',
            'terms'	=> $value,
          )
        ));
      endif;

      if(isset($_GET['resource'])):
        $query->set('tax_query', array(
          array(
            'taxonomy'		=> 'category',
            'field'		=> 'slug',
            'terms'	=> $value,
          )
        ));
      endif;

      if(isset($_GET['author'])):
        $query->set('author__in', $value);
      endif;
  
  
  
    endif;

        
	} 
	
	
  // update meta query

  //Check if taxonomy page and add both post types
  if(is_tax() || is_category()) {
    $query->set('post_type', ['post', 'tribe_events']);
  }

  // echo "<pre>";
  // print_r($query);
  // echo "</pre>";
  
  // }
  
  
});


function noImage() {
  $gallery = get_field('random feat', 'option');

  $index = array_rand($gallery, 1);

  return $gallery[$index]['url'];

}

function load_events() {
  $page = (isset($_POST['page'])) ? $_POST['page'] : 0;

  //return wp_send_json_success($_POST['time']);

  $args = [
    'post_type' => 'tribe_events',
    'post_status' => 'publish',
    'posts_per_page' => '6',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'order' => 'DESC',
    'paged' => $page,
  ];

  if(isset($_POST['time'])):
    $time = $_POST['time'];
    if($time == 'future') {
      $args['order'] = 'ASC';
      $args['meta_query'] = [
        'key' => '_EventStartDate',
        'value' => date( 'Y-m-d H:i:s', current_time( 'timestamp' ) ),
        'compare' => '>'
      ];
    }
    if($time == 'past') {
      $args['meta_query'] = [
        'key' => '_EventStartDate',
        'value' => date( 'Y-m-d H:i:s', current_time( 'timestamp' ) ),
        'compare' => '<'
      ];
    }

  endif;

  $query_filters = array( 
    'evlabel'	=> 'evlabel', 
    'evissue'	=> 'evissue',
  );

  foreach( $query_filters as $key => $name ) {
		
    // continue if not found in url
		if( empty($_POST[ $name ]) ) {
			continue;	
		}
		
		
		// POST the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_POST[ $name ]);
		
		//print_r($value);
		// append meta query

    if(isset($value) && $value) :

      if(isset($_POST['evlabel'])):
      
        $query->set('tax_query', array(
          'relation' => 'AND',
          array(
            'taxonomy'		=> 'label',
            'field'		=> 'slug',
            'terms'	=> $value,
          ),
        ));
      endif;
  
      if(isset($_POST['evissue'])):
        $query->set('tax_query', array(
          array(
            'taxonomy'		=> 'issue',
            'field'		=> 'slug',
            'terms'	=> $value,
          )
        ));
      endif;
    endif;
    
  }

  $loop = new \WP_Query($args);

  //return wp_send_json_success($loop);
  //echo json_encode($loop);
  $data = [];
  //$data['posts'] = $loop;

  //return wp_send_json_success($data);

  foreach($loop->posts as $post) {
    setup_postdata($post);

    //echo json_encode($terms);
    if('link' == get_post_format($post->ID)) {
      $link = get_field('external link', $post->ID);
      $external = 'target="_blank"';
    }
    else {
      $link = get_permalink($post->ID);
      $external = '';
    }

    if($feat = get_the_post_thumbnail_url($post->ID)) {
      $feat = 'true';
    }
    else {
      $feat = 'false';
    }


    $data[] = [
        'title' => get_the_title($post->ID),
        'feat' => $feat,
        'link' => $link,
        'img' => ($img = get_the_post_thumbnail_url($post->ID)) ? $img : noImage(),
        'excerpt' => get_the_excerpt($post->ID),
        'external' => $external,

    ];
    wp_reset_postdata();
  }

  //echo json_encode($data);
  //echo json_encode($data);

  $format = [];

  if($page == $loop->max_num_pages) {
    $format['page'] = 9999;
  }
  else {
    $format['page'] = $page;
  }
  
  $format['response'] = '';

  foreach($data as $post) {
    ob_start();
    include(locate_template('resources/views/partials/content-ajax.blade.php'));
    $format['response'] .= ob_get_clean();
    //$response = view('partials.content', $post)->render();
  }

  return wp_send_json_success($format);


  wp_reset_query();

  die();

}

add_action('wp_ajax_load_events', __NAMESPACE__ . '\\load_events');
add_action('wp_ajax_nopriv_load_events', __NAMESPACE__ . '\\load_events');