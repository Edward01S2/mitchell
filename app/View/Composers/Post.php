<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
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
            'title' => $this->title(),
            'bg' => ($bg = get_the_post_thumbnail_url()) ? $bg : get_field('default bg', 'options')['url'],
            'feat' => $this->getImage(),
            'show_author' => get_field('show_author'),
            'link' => $this->getLink(),
            'external' => $this->external(),
            'random' => $this->noImage(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            /* translators: %s is replaced with the search query */
            return sprintf(
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    public function getImage() {
        if($feat = get_the_post_thumbnail_url()) {
            return $feat;
        }
        else {
            return false;
        }
    }

    public function getLink() {
        if('link' == get_post_format()) {
            return get_field('external link');
        }
        else {
            return get_permalink();
        }
    }

    public function external() {
        if('link' == get_post_format()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function noImage() {
        $gallery = get_field('random feat', 'option');

        $index = array_rand($gallery, 1);

        return $gallery[$index]['url'];

    }
}
