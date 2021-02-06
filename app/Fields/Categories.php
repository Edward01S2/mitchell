<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Categories extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $categories = new FieldsBuilder('categories', [
            'position' => 'side',
            'style' => 'seamless',
        ]);

        $categories
            ->setLocation('taxonomy', '==', 'category');

        $categories
            ->addImage('featured image')
            ->addColorPicker('color')
            ->addColorPicker('font');

        return $categories->build();
    }
}
