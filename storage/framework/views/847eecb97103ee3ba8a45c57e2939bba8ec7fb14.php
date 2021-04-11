<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('partials.event-filters', ['bg' => 'bg-c-gray-50', 'search' => 'false'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="container px-6 pt-8 pb-12 mx-auto lg:px-8 md:pt-8 xl:pb-16">
    <div class="lg:flex">
      <div class="mb-6 lg:flex-shrink-0">
        <div class="relative event-calendar lg:pr-8 xl:pr-12 lg:sticky lg:top-[32px]">
          <div class="mx-auto lg:max-w-xs">
          <?php 
            //echo do_shortcode('[tribe_events]')
            
            echo do_shortcode($shortcode)
            
            // use Tribe\Events\Views\V2\Template_Bootstrap;
            // echo tribe( Template_Bootstrap::class )->get_view_html();
      
          ?>
          </div>
        </div>
      </div>

      <div>
        <h2 id="event-title" class="mb-0 text-3xl md:text-3xl lg:text-4xl xl:text-5xl lg:max-w-none"><?php echo $events_title; ?></h2>
        <div class="flex flex-col divide-y divide-gray-200 posts-ajax-wrapper lg:max-w-none lg:mx-auto">
          <?php if(! $posts['posts']->have_posts()): ?>
            <div class="pt-6 lg:pt-8">
               <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php echo __('Sorry, no results were found.', 'sage'); ?>

               <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
          <?php else: ?>
            <?php while($posts['posts']->have_posts()): ?> <?php ($posts['posts']->the_post()); ?>
            
              <?php echo $__env->make('partials.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endwhile; ?>
            <?php (wp_reset_postdata()); ?>
          <?php endif; ?>
          
          
        </div>

        <div class="flex items-center justify-center space-x-12 pagination-container">
          <?php if($posts['posts']->max_num_pages > 1): ?>
            <button id="event-prev" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" data-page="2">
              <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              <span>Previous Page</span>
            </button>
          <?php endif; ?>
          <button id="event-next" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" style="display:none;" data-page="0">
            <span class="mr-1">Next Page</span>
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
  </div>
  

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/archive-tribe_events.blade.php ENDPATH**/ ?>