<?php

/**
 * Theme helpers.
 */

namespace App;

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
  
  $tax_query = array();

  $tax_query = $query->get('tax_query');

  //print_r($tax_query);

  $tags = get_terms('label', [
      'hide_empty' => false,
  ]);

  // $tag_filters = [];
  // foreach($tags as $tax) {
  //   $tag_filters[$tax->slug] = $tax->name;
  // };

  //var_dump($tag_filters);

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

  // if(is_post_type_archive('tribe_events')) {
  //   $query->set('post_type', ['post', 'tribe_events']);
  // }
  //print_r($query);

});