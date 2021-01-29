<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter( 'tribe_events_views_v2_use_wp_template_hierarchy', '__return_true' );

// add_filter( 'tribe_events_views_v2_use_wp_template_hierarchy', function( $hijack, $template, $context, $query ) {
//     if ( is_singular() ) {
//         $hijack = true;
//     }
   
//     return $hijack;
// }, 10, 4);