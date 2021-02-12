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

}
