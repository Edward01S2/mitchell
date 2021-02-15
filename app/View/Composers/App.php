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
            //'resource_filters' => $this->resourceFilters(),
            //'tag_filters' => $this->tagFilters(),
            //'author_filters' => $this->authorFilters(),
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

    // public function resourceFilters() {
    //     $resources = get_terms('category', [
    //         'hide_empty' => false,
    //     ]);
          
    //     $resource_filters = [];
    //     foreach($resources as $tax) {
    //         if($tax->name !== 'Uncategorized') {
    //             $resource_filters[$tax->slug] = $tax->name;
    //         }
    //     };
          
    //     return $resource_filters;
    // }

}
