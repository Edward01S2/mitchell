<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ExternalLink extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $externalLink = new FieldsBuilder('external_link' ,[
            'position' => 'normal',
        ]);

        $externalLink
            ->setLocation('post_format', '==', 'link');

        $externalLink
            ->addUrl('external link');

        return $externalLink->build();
    }
}
