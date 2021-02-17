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
        'template-events',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'bg' => get_field('event bg', 'options')['url'],
            'title' => get_field('event title', 'options'),
            'content' => get_field('event content', 'options'),
            'pagi' => $this->pagination(),
            'posts' => $this->getPosts(),
            //'calendar' => $this->calendar(),
        ];
    }

    public function pagination() {
      $pagination = Pagi::build();

      return $pagination->links('components.pagination');
    }

    public function getPosts() {

        $page = (isset($_GET['page']) || !(empty($_GET['page']))) ? $_GET['page'] : 1;

        $args = array(
            'post_type' => 'tribe_events',
            'post_status' => 'publish',
            'posts_per_page' => '6',
            'orderby' => 'meta_value',
            'meta_key' => '_EventStartDate',
            'order' => 'DESC',
            'paged' => $page,
        );

        

        // $query->set('orderby', 'meta_value');
        // $query->set('meta_key', '_EventStartDate');
        // $query->set( 'order', 'DESC' );

        $posts = new \WP_Query($args);

        $data['posts'] = $posts;
        // $data['page'] = [
        //     'prev' => $page + 1,
        //     'next' => $page - 1,
        // ];

        return $data;

        // $post_data = [];
        // while($posts->have_posts()): $posts->the_post();
        
        // $id = get_the_ID();

        // //return $term;

        

        // $post_data[$id] = [
        //     'title' => get_the_title(),
        //     'excerpt' => get_the_excerpt(),
        //     'image' => get_the_post_thumbnail_url(),
        //     'url' => ('link' === get_post_format()) ? get_field('external link', $id) : get_the_permalink(),
        //     'external' => ('link' === get_post_format()) ? true : false,
        // ];

        // endwhile;
        // wp_reset_query();

        // return $post_data;
    }
    
    // public function calendar() {
    //     return tribe( Template_Bootstrap::class )->get_view_html();
    // }
}
