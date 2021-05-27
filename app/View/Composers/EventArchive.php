<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Log1x\Pagi\PagiFacade as Pagi;

use Detection\MobileDetect;

class EventArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-tribe_events',
        'template-events-test',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'bg' => get_field('event bg', 'options')['url'],
            'title' => get_field('event title', 'options'),
            'content' => get_field('event content', 'options'),
            'pagi' => $this->pagination(),
            'posts' => $this->getPosts(),
            //'top' => $this->getTopTags(),
            'tag_filters' => $this->tagFilters(),
            'events_title' => $this->getTitle(),
            'shortcode' => $this->calendarEvents(),
            'tag_input' => get_field('tag title', 'options'),
            'tag_top' => get_field('top tags label', 'options'),
            'mobile' => $this->mobile(),
            //'calendar' => $this->calendar(),
        ];
    }

    public function pagination() {
      $pagination = Pagi::build();

      return $pagination->links('components.pagination');
    }

    public function mobile() {
      $detect = new MobileDetect;

      return $detect->isMobile();
    }

    public function calendarEvents() {
      $shortcode = '[ecs-list-events design="calendar" hide_extra_days="true"';
      if(isset($_GET['time'])):
        $time = $_GET['time'];
        if($time === 'future') {
          $shortcode .= ' futureonly="true"';
        }
        if($time === 'past') {
          $shortcode .= ' past="yes"';
        }

      endif;

      if(isset($_GET['evlabel'])):
        $shortcode .= ' tag="'. $_GET['evlabel'] .'"';
      endif;
  
      if(isset($_GET['evissue'])):
        $shortcode .= ' issue="'. $_GET['evissue'] .'"';
      endif;

      // if(isset($_GET['evissue']) && isset($_GET['evlabel'])):
      //   $shortcode .= ' tag_cat_operator="AND"';
      // endif;

      $shortcode .= ']';

      return $shortcode;
    }

    public function getPosts() {

        $page = (isset($_GET['page']) || !(empty($_GET['page']))) ? $_GET['page'] : 1;

        $args = array(
            'post_type' => 'tribe_events',
            'post_status' => 'publish',
            'posts_per_page' => '6',
            'orderby' => 'meta_value',
            'meta_key' => '_EventStartDate',
            'order' => 'DESC',
            'paged' => $page,
        );

        if(isset($_GET['time'])):
          $time = $_GET['time'];
          if($time === 'future') {
            $args['order'] = 'ASC';
            $args['meta_query'] = [
              'key' => '_EventStartDate',
              'value' => date( 'Y-m-d' ),
              'compare' => '>=',
              'type' => 'DATETIME'
            ];
          }
          if($time === 'past') {
            $args['meta_query'] = [
              'key' => '_EventStartDate',
              'value' => date( 'Y-m-d' ),
              'compare' => '<',
              'type' => 'DATETIME'
            ];
          }

        endif;

        //Check for tag url params
        $query_filters = array( 
          'evlabel'	=> 'evlabel', 
          'evissue'	=> 'evissue',
        );

        foreach( $query_filters as $key => $name ) {
		
          // continue if not found in url
          if( empty($_GET[ $name ]) ) {
            
            continue;
            
          }

          // get the value for this filter
          // eg: http://www.website.com/events?city=melbourne,sydney
          $value = explode(',', $_GET[ $name ]);
          
      
          if(isset($_GET['evlabel'])):
            $args['tax_query'] = [
              'relation' => 'AND',
              [
                'taxonomy'		=> 'label',
                'field'		=> 'slug',
                'terms'	=> $value,
              ]
            ];
          endif;
      
          if(isset($_GET['evissue'])):
            $args['tax_query'] = [
              array(
                'taxonomy'		=> 'issue',
                'field'		=> 'slug',
                'terms'	=> $value,
              )
            ];
          endif;
              
        }

        $posts = new \WP_Query($args);

        //return $posts;

        $data['posts'] = $posts;

        return $data;

    }

    public function getTitle() {
      if(isset($_GET['time'])):
        $time = $_GET['time'];
        if($time === 'future') {
          return 'Upcoming Events';
        }
        if($time === 'past') {
          return 'Past Events';
        }
      endif;

      return 'All Events';
    }

    public function getTerms() {
        $term = get_queried_object();
  
        $terms = get_terms($term->taxonomy, [
          'hide_empty' => false,
        ]);
  
        $data = [];
        foreach($terms as $term) {
          if($term->name !== 'Uncategorized') {
            $data[] = [
                'name' => $term->name,
                'slug' => $term->slug,
                'desc' => $term->description,
                // 'img' => get_field('featured image', $term),
                // 'color' => get_field('color', $term),
                // 'font' => get_field('font', $term),
            ];
          }
        }
  
        return $data;
      }
      
      // public function getTopTags() {
      //   $term = get_queried_object();
  
      //   $top = get_field('tax', $term);
  
      //   return $top;
        
      // }
  
      public function tagFilters() {
          
          $top = get_field('event tax', 'options');
          if(isset($top) && $top) {
            //Array of terms IDs for the top tags set for the taxonomy
            $check_ids = wp_list_pluck($top, 'term_id');
          }
  
          
          $objects = get_posts([
            'post_type' => 'tribe_events',
            'numberposts' => -1,
            'order' => 'DESC',
            'fields' => 'ids',
          ]);

          //return $options;
          $tags = wp_get_object_terms( $objects, 'label' );
  
         
        
          //return $objects;
  
        $tag_filters = [];
        if(isset($tags) && !empty($tags)) :
          foreach($tags as $tax) {
            if(isset($check_ids) && in_array($tax->term_id, $check_ids)) {
                $tag_filters['top'][$tax->slug] = $tax->name;
            }
            else {
                $tag_filters['tags'][$tax->slug] = $tax->name;
            }
          };
        endif;
          
        return $tag_filters;
      }
    

}
