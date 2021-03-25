<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Facades\Navi;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'navigation' => $this->navigation(),
            'logo' => get_field('Logo', 'options'),
            'issues' => $this->getIssues(),
            'resources' => $this->getResources(),
            'about_img' => get_field('about nav', 'options'),
            'events_img' => get_field('event nav', 'options'),
            'donate_img' => get_field('donate nav', 'options'),
            'contact_img' => get_field('contact nav', 'options'),
            'analysis_img' => get_field('resources nav', 'options'),
            'issues_img' => get_field('issues nav', 'options'),
        ];
    }

    public function navigation()
    {
        if (Navi::build()->isEmpty()) {
            return;
        }

        return Navi::build()->toArray();
    }

    public function getIssues() {

      $terms = get_terms('issue', [
        'hide_empty' => false,
      ]);

      $data = [];
        foreach($terms as $term)
        $data[] = [
            'name' => $term->name,
            'slug' => $term->slug,
            'desc' => $term->description,
            //'img' => get_field('featured image', $term),
            'color' => get_field('color', $term),
            'font' => get_field('font', $term),
        ];

        return $data;
    }

    public function getResources() {
        $terms = get_terms('category', [
            'hide_empty' => false,
        ]);

        $data = [];
        foreach($terms as $term)
            if($term->name !== 'Uncategorized') :
                $data[] = [
                    'name' => $term->name,
                    'slug' => $term->slug,
                    'desc' => $term->description,
                    'color' => get_field('color', $term),
                    'font' => get_field('font', $term),
                ];
            endif;

        return $data;
    }

}
