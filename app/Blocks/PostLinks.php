<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class PostLinks extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Post Links';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple PostLinks block.';

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
    public $post_types = ['post', 'tribe_events'];

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
    public $align = '';

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
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'links' => $this->links(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $postLinks = new FieldsBuilder('post_links');

        $postLinks
            ->addRepeater('links', [
                'max' => '3',
                'min' => '3',
            ])
                ->addTrueFalse('true', [
                    'label' => 'Link?',
                    'default_value' => 1,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ])
                    ->setWidth('16')
                ->addLink('link')
                    ->setWidth('42')
                    ->conditional('true', '==', '1')
                ->addFile('file')
                    ->setWidth('42')
                    ->conditional('true', '==', '0')
                ->addText('title')
                    ->setWidth('42')
                    ->conditional('true', '==', '0')
            ->endRepeater();

        return $postLinks->build();
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

    public function links()
    {
        return get_field('links') ?: [];
    }
}
