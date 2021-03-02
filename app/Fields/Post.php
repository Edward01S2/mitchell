<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Post extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        // $post = new FieldsBuilder('post', [
        //     'position' => 'side',
        //     'style' => 'seamless',
        // ]);

        // $post
        //     ->setLocation('post_type', '==', 'post');

        // $post
        //     ->addTrueFalse('show_author', [
        //         'label' => 'Show Author?'
        //     ]);

        // return $post->build();
    }
}
