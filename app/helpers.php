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

        
	} 
	
	
  // update meta query
  if(isset($value) && $value) :
    $query->set('tax_query', array(
      array(
        'taxonomy'		=> 'label',
        'field'		=> 'slug',
        'terms'	=> $value,
      )
    ));
  endif;
  
  //print_r($query);

});