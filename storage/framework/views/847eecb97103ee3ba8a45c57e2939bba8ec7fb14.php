<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="event-calendar">
    <?php 
  //     $args = [
  //       'post_status' => 'publish',
  //       'post_type' => 'tribe_events',
  //       'post_per_page' => -1,
  // ];
  //     global $wp_query;
  //     $events = new \WP_Query($args);

  //     if($events->have_posts()) : while($events->have_posts()) : $events->the_post();

        // use Tribe\Events\Views\V2\Template_Bootstrap;
        // echo tribe( Template_Bootstrap::class )->get_view_html();
        // echo do_shortcode('[tribe_events]');
      
      //   endwhile;
      // endif;
      // wp_reset_postdata();
      echo do_shortcode('[tribe_events]');
    ?>
  </div>

  <div class="container px-6 pb-12 mx-auto lg:px-8 md:pt-8 lg:pt-12 xl:pb-16">
    <div class="flex flex-col divide-y divide-gray-200 posts-wrapper lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">
      <?php while(have_posts()): ?> <?php (the_post()); ?>
      
        <?php echo $__env->first(['partials.content-' . get_post_type(), 'partials.content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endwhile; ?>
    </div>

    <?php echo $pagi; ?>

  </div>
  

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/archive-tribe_events.blade.php ENDPATH**/ ?>