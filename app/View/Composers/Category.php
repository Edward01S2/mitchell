<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Log1x\Pagi\PagiFacade as Pagi;

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
      ];
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
    


}
