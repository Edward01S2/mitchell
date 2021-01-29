<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Log1x\Pagi\PagiFacade as Pagi;

class EventArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-tribe_events',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'bg' => get_field('event bg', 'options'),
            'title' => get_field('event title', 'options'),
            'content' => get_field('event content', 'options'),
            'pagi' => $this->pagination(),
        ];
    }

    public function pagination() {
      $pagination = Pagi::build();

      return $pagination->links();
    }

}
