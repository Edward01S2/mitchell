<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Resources extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Resources';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Resources block.';

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
            'cats' => $this->getCats(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $resources = new FieldsBuilder('resources');

        $resources
            ->addTextarea('resources', [
                'readonly' => '1',
                'default_value' => 'Resources block',
                'rows' => '3',
            ]);

        return $resources->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }

    public function getCats() {
        $terms = get_terms('category', [
            'hide_empty' => false,
        ]);

        $data = [];
        foreach($terms as $term)
        $data[] = [
            'name' => $term->name,
            'slug' => $term->slug,
            'desc' => $term->description,
            'img' => get_field('featured image', $term),
            'color' => get_field('color', $term),
            'font' => get_field('font', $term),
        ];

        return $data;
    }
}
