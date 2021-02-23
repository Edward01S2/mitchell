<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class News extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'News';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple News block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'acf';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = 'wide';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => get_field('title'),
            'link' => get_field('link'),
            'posts' => $this->getPosts(),

        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $news = new FieldsBuilder('news');

        $news
            ->addText('title')
            ->addLink('link')
            ->addTaxonomy('tax', [
                'field_type' => 'radio',
            ]);

        return $news->build();
    }

    public function getPosts() {
        $args = array(
            'post_type' => ['post', 'tribe_events'],
            'post_status' => 'publish',
            'posts_per_page' => '8',
            'order' => 'DESC',
            'cat' => get_field('tax'),
        );

        $posts = new \WP_Query($args);

        $post_data = [];
        while($posts->have_posts()): $posts->the_post();
        
        $id = get_the_ID();

        //return $term;

        

        $post_data[$id] = [
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'image' => ($img = get_the_post_thumbnail_url()) ? $img : $this->noImage(),
            'url' => ('link' === get_post_format()) ? get_field('external link', $id) : get_the_permalink(),
            'external' => ('link' === get_post_format()) ? true : false,
        ];

        endwhile;
        wp_reset_query();

        return $post_data;
    }

    public function noImage() {
        $gallery = get_field('random feat', 'option');

        $index = array_rand($gallery, 1);

        return $gallery[$index]['url'];

    }

}
