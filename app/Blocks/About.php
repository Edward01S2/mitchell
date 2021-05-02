<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class About extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'About';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple About block.';

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
            'content' => get_field('content'),
            'items' => get_field('items'),
            'content2' => get_field('content 2'),
            'staff' => get_field('staff'),
            'fellows' => get_field('fellows'),
            'fellows_content' => get_field('nr content'),
            'af_content' => get_field('af content'),
            'af_fellows' => get_field('af fellows'),
            'aff_content' => get_field('aff content'),
            'alumini' => get_field('alumini'),
            'careers' => get_field('careers'),
            'career_content' => get_field('career content'),
            'issues' => $this->getIssues(),
            'issues_bg' => get_field('issues bg'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $about = new FieldsBuilder('about');

        $about
            ->addTab('Mission')
                ->addWysiwyg('content')
                ->addRepeater('items', [
                    'collapsed' => 'title',
                ])
                    ->addText('title')
                    ->addTextarea('content', [
                        'rows' => '2',
                    ])
                    ->addImage('image')
                ->endRepeater()
                ->addWysiwyg('content 2', [
                    'label' => 'Content'
                ])
                ->addImage('issues bg')
            ->addTab('Staff')
                ->addRepeater('staff', [
                    'collapsed' => 'name'
                ])
                    ->addText('name')
                    ->addText('title')
                        ->setWidth('50')
                    ->addText('email')
                        ->setWidth('50')
                    ->addWysiwyg('excerpt')
                    ->addWysiwyg('bio')
                    ->addImage('image')
                    ->addFile('download')
                ->endRepeater()
            ->addTab('Non-Resident Fellows')
                ->addWysiwyg('nr content')
                ->addRepeater('fellows', [
                    'collapsed' => 'name'
                ])
                    ->addText('name')
                    ->addText('title')
                        ->setWidth('50')
                    ->addText('email')
                        ->setWidth('50')
                    ->addWysiwyg('excerpt')
                    ->addWysiwyg('bio')
                    ->addImage('image')
                    ->addFile('download')
                ->endRepeater()
            ->addTab('Air Force Fellows Alumni')
                ->addWysiwyg('aff content')
                ->addRepeater('alumini', [
                    'collapsed' => 'name'
                ])
                    ->addText('name')
                    ->addText('title')
                        ->setWidth('50')
                    ->addText('email')
                        ->setWidth('50')
                    ->addWysiwyg('excerpt')
                    ->addWysiwyg('bio')
                    ->addImage('image')
                    ->addFile('download')
                ->endRepeater()
            ->addTab('AF Fellows')
                ->addWysiwyg('af content')
                ->addRepeater('af fellows', [
                    'collapsed' => 'name'
                ])
                    ->addText('name')
                    ->addText('title')
                        ->setWidth('50')
                    ->addText('email')
                        ->setWidth('50')
                    ->addWysiwyg('excerpt')
                    ->addWysiwyg('bio')
                    ->addImage('image')
                    ->addFile('download')
                ->endRepeater()
            ->addTab('Careers')
                ->addWysiwyg('career content')
                ->addRepeater('careers', [
                    'collapsed' => 'title'
                ])
                    ->addText('title')
                        ->setWidth('50')
                    ->addDatePicker('date', [
                        'display_format' => 'm/d/Y',
                        'return_format' => 'F j, Y'
                    ])
                        ->setWidth('50')
                    ->addWysiwyg('description')
                ->endRepeater()
            ;

        return $about->build();
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
            'img' => get_field('featured image', $term),
            'color' => get_field('color', $term),
            'font' => get_field('font', $term),
        ];

        return $data;
    }

}
