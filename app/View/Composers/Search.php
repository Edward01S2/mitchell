<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Log1x\Pagi\PagiFacade as Pagi;

class Search extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'search'
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */

    
    public function override() {

      $cat = get_queried_object();

      return [
          //'bg' => $this->getBG(),
          //'title' => ($title = get_field('title', $cat)) ? $title : $cat->name,
          //'content' => get_field('content', $cat),
          'pagi' => $this->pagination(),
          //'terms' => $this->getTerms(),
          // 'more_title' => get_field($cat->taxonomy . ' title', 'options'),
          // 'more_bg' => get_field($cat->taxonomy . ' bg', 'options'),
          // 'more_tax' => $cat,
          //'top' => $this->getTopTags(),
          'resource_filters' => $this->resourceFilters(),
          'author_filters' => $this->authorFilters(),
          'tag_filters' => $this->tagFilters(),
          'tag_input' => 'Tags',
      ];
    }

    public function pagination() {
      $pagination = Pagi::build();

      return $pagination->links('components.pagination');
    }

    public function authorFilters() {
      $users = get_users([
          'orderby' => 'nicename',
          'order' => 'ASC',
          'has_published_posts' => array('post'),
          //'role__in' => ['author'],
      ]);

      $user_list = [];

      foreach($users as $user) {
          if($user->data->user_nicename !== 'admin') {
              $user_list[] = [
                  'id' => $user->ID,
                  'name' => $user->data->display_name,
              ];
          }
      }

      return $user_list;
  }

  public function resourceFilters() {
    $resources = get_terms('category', [
        'hide_empty' => false,
    ]);
      
    $resource_filters = [];
    foreach($resources as $tax) {
        if($tax->name !== 'Uncategorized') {
            $resource_filters[$tax->slug] = $tax->name;
        }
    };
      
    return $resource_filters;
}
    
    // public function getTopTags() {
    //   $term = get_queried_object();

    //   $top = get_field('tax', $term);

    //   return $top;
      
    // }

    public function tagFilters() {
        
      if(is_search()) {

      
        //$term = get_queried_object();

       //var_dump($term);
        //return $term;

        // $top = get_field('tax', $term);
        // if(isset($top) && $top) {
        //   //Array of terms IDs for the top tags set for the taxonomy
        //   $check_ids = wp_list_pluck($top, 'term_id');
        // }

        //return $check_ids;

        // if($term) :
          $objects = get_posts([
            'post_type' => ['post', 'tribe_events'],
            'numberposts' => -1,
            's' => get_search_query(),
            'order' => 'DESC',
            // 'tax_query' => [
            //   [
            //     'taxonomy' => $term->taxonomy,
            //     'field' => 'term_id',
            //     'terms' => $term->term_id,
            //   ]
            // ],
            'fields' => 'ids',
          ]);

          

          //return $options;
          $tags = wp_get_object_terms( $objects, 'label' );

        // endif;
      
        //return $tags;

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
          asort($tag_filters['tags']);
        endif;
        
        return $tag_filters;
      }
    }


  //     // $tags = get_terms([
  //     //     'taxonomy' => 'tag',
  //     //     'hide_empty' => true,
  //     // ]);


        
  //     //return $tags;
      
    
  // }
    


}
