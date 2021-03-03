<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ArchiveSettings extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $categoryArchive = new FieldsBuilder('archive_settings', [
            'label' => 'Archive Settings'
        ]);

        $categoryArchive
            ->setLocation('taxonomy', '==', 'category')
                ->or('taxonomy', '==', 'issue');

        $categoryArchive
            ->addText('title', [
                'label' => 'Title'
            ])
            ->addTextarea('content', [
                'label' => 'Content'
            ])
            ->addImage('bg', [
                'label' => 'BG Image'
            ])
            ->addTaxonomy('tax', [
                'label' => 'Top Tags',
                'taxonomy' => 'label',
                'field_type' => 'multi_select',
                'multiple' => 1,
                'add_term' => 0,
                'return_format' => 'object',
            ])
            ->addText('tag title')
                ->setWidth('50')
            ->addText('top tags label')
                ->setWidth('50');

        return $categoryArchive->build();
    }
}
