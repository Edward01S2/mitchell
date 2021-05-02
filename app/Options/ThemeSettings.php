<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Partials\GForm;

class ThemeSettings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme Settings';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Theme Settings';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $themeSettings = new FieldsBuilder('theme_settings');

        $themeSettings
        ->addTab('Logos')
            ->addImage('Logo')
            ->addImage('Logo Alt')
        ->addTab('Scripts')
            ->addTextarea('header_scripts', [
                'label' => 'Header Scripts',
                'rows' => '15'
            ])
            ->addTextarea('footer_scripts', [
                'label' => 'Footer Scripts',
                'rows' => '15'
            ])
        ->addTab('Header')
            ->addImage('about nav')
            ->addImage('event nav')
            ->addImage('donate nav')
            ->addImage('contact nav')
            ->addImage('resources nav')
            ->addImage('issues nav')
        ->addTab('Post')
            ->addImage('default bg')
            ->addGallery('random feat')
        ->addTab('Footer')
            ->addText('footer text')
            ->addText('footer text 2')
            ->addImage('afa logo')
            ->addText('form text')
            ->addFields($this->get(GForm::class))
            ->addText('copyright')
            ->addRepeater('footer links')
                ->addLink('link')
            ->endRepeater()
        ->addTab('Social')
            ->addRepeater('Social')
                ->addImage('icon')
                ->addUrl('url')
                // ->addColorPicker('bg')
            ->endRepeater();

        return $themeSettings->build();
    }
}
