<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Partials\GForm;

class Contact extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Contact';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Contact block.';

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
            'form_title' => get_field('form title'),
            'form' => get_field('gravity'),
            'form_bg' => get_field('form bg'),
            'phone' => get_field('phone'),
            'email' => get_field('email'),
            'address_1' => get_field('address 1'),
            'address_2' => get_field('address 2'),
            'address_link' => get_field('address link'),
            'map' => get_field('map'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $contact = new FieldsBuilder('contact');

        $contact
            ->addText('form title')
            ->addFields($this->get(GForm::class))
            ->addImage('form bg')
            ->addText('phone')
            ->addText('email')
            ->addText('address 1')
                ->setWidth('50')
            ->addText('address 2')
                ->setWidth('50')
            ->addUrl('address link')
            ->addImage('map');
            

        return $contact->build();
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
}
