<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Issues extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $issues = new FieldsBuilder('issues', [
            'position' => 'side',
            'style' => 'seamless',

        ]);

        $issues
            ->setLocation('taxonomy', '==', 'issue');

        $issues
            ->addImage('featured image')
            ->addColorPicker('color')
            ->addColorPicker('font');

        return $issues->build();
    }
}
