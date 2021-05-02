<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Facades\Navi;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.footer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'navigation' => array_values($this->navigation('footer_navigation')),
            'logo' => get_field('Logo', 'options'),
            'logo_text' => get_field('footer text', 'options'),
            'footer_text_2' => get_field('footer text 2', 'options'),
            'afa_logo' => get_field('afa logo', 'options'),
            // 'issues' => $this->getIssues(),
            // 'resources' => $this->getResources(),
            'social' => get_field('Social', 'options'),
            'copy' => get_field('copyright', 'options'),
            'links' => get_field('footer links', 'options'),
            'form' => get_field('gravity', 'options'),
            'form_text' => get_field('form text', 'options'),
        ];
    }

    public function navigation($name)
    {
        if (Navi::build()->isEmpty()) {
            return;
        }
        
        return Navi::build($name)->toArray();
    }

    public function getIssues() {
      return $terms = get_terms('issue', [
        'hide_empty' => false,
      ]);
    }

    public function getResources() {
      return $terms = get_terms('category', [
        'hide_empty' => false,
      ]);
    }

}
