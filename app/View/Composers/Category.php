<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Log1x\Pagi\PagiFacade as Pagi;

use Detection\MobileDetect;

class Category extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'category',
        'taxonomy',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */

    
    public function override() {

      $cat = get_queried_object();

      return [
          'bg' => $this->getBG(),
          'title' => ($title = get_field('title', $cat)) ? $title : $cat->name,
          'content' => get_field('content', $cat),
          'pagi' => $this->pagination(),
          'terms' => $this->getTerms(),
          'more_title' => get_field($cat->taxonomy . ' title', 'options'),
          'more_bg' => get_field($cat->taxonomy . ' bg', 'options'),
          'more_tax' => $cat,
          'top' => $this->getTopTags(),
          'tag_filters' => $this->tagFilters(),
          'resource_filters' => $this->resourceFilters(),
          'cat' => $cat,
          'tag_input' => get_field('tag title', $cat),
          'tag_top' => get_field('top tags label', $cat),
          'mobile' => $this->mobile(),
      ];
    }

    public function mobile() {
      $detect = new MobileDetect;

      return $detect->isMobile();
    }

    public function pagination() {
      $pagination = Pagi::build();

      return $pagination->links('components.pagination');
    }

    public function getBG() {
      $cat = get_queried_object();
      $bg = get_field('bg', $cat);
      if(isset($bg) && $bg) {
        return $bg['url'];
      }
      else {
        return get_field('default archive bg', 'options')['url'];
      }
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
              'img' => get_field('featured image', $term),
              'color' => get_field('color', $term),
              'font' => get_field('font', $term),
          ];
        }
      }

      return $data;
    }
    
    public function getTopTags() {
      $term = get_queried_object();

      $top = get_field('tax', $term);

      return $top;
      
    }

    public function tagFilters() {
        
      if(is_archive()) {

      
        $term = get_queried_object();

       //var_dump($term);
        //return $term;

        $top = get_field('tax', $term);
        if(isset($top) && $top) {
          //Array of terms IDs for the top tags set for the taxonomy
          $check_ids = wp_list_pluck($top, 'term_id');
        }

        //return $check_ids;

        if($term) :
          $objects = get_posts([
            'post_type' => ['post', 'tribe_events'],
            'numberposts' => -1,
            'order' => 'DESC',
            'tax_query' => [
              [
                'taxonomy' => $term->taxonomy,
                'field' => 'term_id',
                'terms' => $term->term_id,
              ]
            ],
            'fields' => 'ids',
          ]);

          

          //return $options;
          $tags = wp_get_object_terms( $objects, 'label' );

        endif;
      
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


      // $tags = get_terms([
      //     'taxonomy' => 'tag',
      //     'hide_empty' => true,
      // ]);


        
      //return $tags;
      
    
  
    


}
