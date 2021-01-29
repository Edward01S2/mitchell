<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;

/**
 * Register the `.brand` selector to the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('js/customizer.js')->uri(), ['customize-preview'], null, true);
});

add_action( 'wp_dashboard_setup', function () {
	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	//remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // At a Glance
	//remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity

    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
});

add_action( 'init', function() {

    register_extended_post_type( 'post', array(
        'admin_cols' => [
            'categories',
            'issue' => [
                'taxonomy' => 'issue'
            ],
            'tags',
            'author',
            'date',
        ],
        'admin_filters' => [
            'issue' => [
                'taxonomy' => 'issue'
            ],
            'tags' => [
                'taxonomy' => 'post_tag'
            ],
        ],
    ) );

} );

add_filter( 'tribe_events_editor_default_template', function( $template ) {
    if(class_exists('acf')) {
        $template = [
            [ 'tribe/event-datetime' ],
            [ 'acf/speaker' ],
            [ 'core/paragraph', [
                'placeholder' => __( 'Add Description...', 'the-events-calendar' ),
                ], 
            ],
            [ 'acf/post-links' ],
        ];
    }
    return $template;
}, 11, 1 );
  