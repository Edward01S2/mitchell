<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class PostSettings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Archive Settings';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'post-settings';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Default Archive Settings';

    /**
     * The option page permission capability.
     *
     * @var string
     */
    public $capability = 'edit_theme_options';

    /**
     * The option page menu position.
     *
     * @var int
     */
    public $position = PHP_INT_MAX;

    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'edit.php';

    /**
     * The option page menu icon.
     *
     * @var string
     */
    public $icon = null;

    /**
     * Redirect to the first child page if one exists.
     *
     * @var boolean
     */
    public $redirect = true;

    /**
     * The post ID to save and load values from.
     *
     * @var string|int
     */
    public $post = 'options';

    /**
     * The option page autoload setting.
     *
     * @var bool
     */
    public $autoload = true;

    /**
     * Localized text displayed on the submit button.
     *
     * @return string
     */
    public function updateButton()
    {
        return __('Update', 'acf');
    }

    /**
     * Localized text displayed after form submission.
     *
     * @return string
     */
    public function updatedMessage()
    {
        return __('PostSettings Updated', 'acf');
    }

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $postSettings = new FieldsBuilder('post_settings');

        $postSettings
            ->addTab('Defaults')
                ->addImage('default archive bg', [
                    'label' => 'BG Image'
                ])
            ->addTab('Resource')
                ->addText('category title', [
                    'label' => 'Title'
                ])
                ->addImage('category bg', [
                    'label' => 'BG'
                ])
            ->addTab('Issue')
                ->addText('issue title', [
                    'label' => 'Title'
                ])
                ->addImage('issue bg', [
                    'label' => 'BG'
                ]);

        return $postSettings->build();
    }
}
