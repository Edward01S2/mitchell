<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Featured extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Featured';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Featured block.';

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
            'posts' => $this->getPosts(),
            'title' => get_field('title'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $featured = new FieldsBuilder('featured');

        $featured
            ->addText('title');

        return $featured->build();
    }

    public function getPosts() {
        $args = array(
            'post_type' => ['post', 'tribe_events'],
            'post_status' => 'publish',
            'posts_per_page' => '4',
            'order' => 'DESC',
            'meta_query' => array(array('key' => '_thumbnail_id')),
        );

        $posts = new \WP_Query($args);

        $post_data = [];
        while($posts->have_posts()): $posts->the_post();
        
        $id = get_the_ID();

        //return $term;

        $post_data[$id] = [
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'term' => get_the_terms($id, 'issue'), 
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
