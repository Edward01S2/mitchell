<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'issue_filters' => $this->issueFilters(),
            'resource_filters' => $this->resourceFilters(),
            'tag_filters' => $this->tagFilters(),
            'author_filters' => $this->authorFilters(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function issueFilters() {
          
        $issues = get_terms('issue', [
        'hide_empty' => false,
        ]);
        
        $issue_filters = [];
        foreach($issues as $tax) {
        $issue_filters[$tax->slug] = $tax->name;
        };
        
        return $issue_filters;
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

    public function tagFilters() {
        
        if($term = get_queried_object()) {

          $objects = get_posts([
              'post_type' => 'post',
              'numberposts' => -1,
              'tax_query' => [
                [
                  'taxonomy' => $term->taxonomy,
                  'field' => 'term_id',
                  'terms' => $term->term_id,
                ]
              ],
          ]);
          
          foreach ($objects as $object) {
            $object_ids[] = $object->ID;
          }

          $collections = wp_get_object_terms( $object_ids, 'tag' );

          return $collections;
        }

        $tags = get_terms('tag', [
            'hide_empty' => false,
        ]);

        if($top = get_field('tax', $term)) {
            $check_ids = wp_list_pluck($top, 'term_id');
        }
          
        //return $tags;
        
        $tag_filters = [];
        foreach($tags as $tax) {
            if(isset($check_ids) && in_array($tax->term_id, $check_ids)) {
                $tag_filters['top'][$tax->slug] = $tax->name;
            }
            else {
                $tag_filters['tags'][$tax->slug] = $tax->name;
            }
        };
        
        return $tag_filters;
    }

    public function authorFilters() {
        $users = get_users([
            'orderby' => 'nicename',
            'order' => 'ASC',
            'has_published_posts' => array('post')
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

}
