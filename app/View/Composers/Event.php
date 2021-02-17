<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Event extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-tribe_events',
        'single-tribe_events',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'event' => tribe_get_event(get_the_ID()),
            'bg' => ($bg = get_the_post_thumbnail_url()) ? $bg : get_field('default bg', 'options')['url'],
            'speaker' => $this->speaker(),
        ];
    }

    public function speaker() {
      if ( function_exists( 'get_field' ) ) {
        $pid = get_post();
        //return($pid);
        //return $pid_content;
        if ( has_blocks( $pid ) ) {
          $blocks = parse_blocks( $pid->post_content );
          //return $blocks;
          foreach ( $blocks as $block ) {
            if ( $block['blockName'] === 'acf/speaker' ) {
              return $block['attrs']['data']['speaker'];
              //return $post_format = $post_layout['items'];// name of the field
            } 
            // elseif ( $block['blockName'] === 'core/block' ) {
            //   $block_content = parse_blocks( get_post( $block['attrs']['ref'] )->post_content );
            //   if ( $block_content[0]['blockName'] === 'acf/your-block-name' ) {
            //     // Access to "some" block data
            //   }
            // }
          }
        }
      }

    }

}
