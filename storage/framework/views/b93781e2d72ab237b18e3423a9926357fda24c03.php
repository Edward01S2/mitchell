<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php if(! have_posts()): ?>
    <div class="container px-6 py-12 mx-auto lg:px-8">
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
  <?php endif; ?>

  <?php if(have_posts()): ?>
    
    <?php echo $__env->make('partials.filters', ['bg' => 'bg-c-gray-50', 'search' => 'false'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="container px-6 pb-12 mx-auto lg:px-8 md:pt-8 lg:pt-12 xl:pb-16">
      <div class="flex flex-col divide-y divide-gray-200 posts-wrapper lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">
        <?php while(have_posts()): ?> <?php (the_post()); ?>
          <?php echo $__env->first(['partials.content-' . get_post_type(), 'partials.content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endwhile; ?>
      </div>

      <?php echo $pagi; ?>

    </div>
  <?php endif; ?>

  <?php if($terms): ?>
    <div class="overflow-hidden bg-gray-800 bg-center bg-cover" style="background-image:url(<?php echo $more_bg['url']; ?>);">
      <div class="">
        <div class="py-12 pb-16 md:pt-16 md:pb-24 lg:pt-20 lg:pb-32 xl:pt-28">
          <div class="container px-6 mx-auto lg:px-8">
            <h2 class="mb-8 text-3xl text-white md:text-3xl md:mb-12 lg:text-4xl lg:mb-16"><?php echo $more_title; ?></h2>
          </div>

          <div class="relative">
            <div class="container mx-auto swiper-container tax-slider">
              <div class="px-6 lg:px-8 swiper-wrapper">

                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="/<?php echo $more_tax->taxonomy; ?>/<?php echo $issue['slug']; ?>" class="flex flex-col issue-item swiper-slide md:max-w-xs lg:max-w-sm" style="background-color: <?php echo $issue['color']; ?>;">
                    <div>
                      <img class="object-cover w-full h-48 xl:h-56 issue-image" src="<?php echo $issue['img']['url']; ?>" alt="">
                    </div>
                    <div class="p-6 sm:p-8 xl:p-10" style="background-color: <?php echo $issue['color']; ?>; color: <?php echo $issue['font']; ?>;">
                      <h4 class="mb-2 text-xl md:text-2xl"><?php echo $issue['name']; ?></h4>
                      <p class="leading-snug lg:text-lg line-clamp-3"><?php echo $issue['desc']; ?></p>
                    </div>
                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
            </div>

            <div class="flex justify-between w-full tax-btns">
              <div class="left-0 inline-block p-2 ml-2 bg-white bg-opacity-75 rounded-full hover:bg-opacity-100 tax-btn-prev tax-btn lg:ml-6 xl:ml-12">
                <svg class="w-4 h-4 fill-current text-c-blue-200 lg:w-5 lg:h-5 xl:h-6 xl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="right-0 inline-block p-2 mr-2 bg-white bg-opacity-75 rounded-full hover:bg-opacity-100 tax-btn-next tax-btn lg:mr-6 xl:mr-12">
                <svg class="w-4 h-4 fill-current text-c-blue-200 lg:w-5 lg:h-5 xl:w-6 xl:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  <?php endif; ?>

  
  
  

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/category.blade.php ENDPATH**/ ?>