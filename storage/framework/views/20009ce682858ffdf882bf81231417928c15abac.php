<div class="<?php echo e($block->classes); ?>">
  <div class="grid grid-cols-1 stats-container md:grid-cols-2">
    <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="relative transition duration-300 stat group">

        <div class="absolute inset-0 z-10 w-full h-full transition bg-white opacity-90 group-hover:bg-c-blue-150"></div>
        <img src="<?php echo $stat['bg']['url']; ?>" alt="" class="absolute inset-0 z-0 object-cover w-full h-full grayscale">

        <div class="relative z-20 md:h-full md:w-full">
          <div class="container px-6 py-12 mx-auto stat-inner-container md:flex md:flex-col md:h-full md:container-none md:max-w-md/2 md:py-16 lg:max-w-lg/2 lg:px-8 xl:max-w-xl/2 xl:py-20 2xl:py-24 2xl:max-w-screen-md">
            <div class="md:flex-grow group-hover:text-white">
              <div class="mb-2 text-5xl font-black font-whyte md:text-6xl"><?php echo $stat['number']; ?></div>
              <div class="max-w-xs mb-8 leading-tight font-whyte"><?php echo $stat['description']; ?></div>
              <h3 class="text-2xl leading-tight"><?php echo $stat['title']; ?></h3>
              <div class="w-3/4 h-px mt-2 mb-4 bg-black md:w-1/2 group-hover:bg-white"></div>
              <p class="mb-8 lg:text-lg lg:leading-tight"><?php echo $stat['content']; ?></p>
            </div>
            <div>
              <a href="<?php echo $stat['link']['url']; ?>" class="inline-flex px-8 py-3 text-white border bg-c-blue-300 font-whyte border-c-blue-300 group-hover:bg-transparent group-hover:border-white">
                <span><?php echo $stat['link']['title']; ?></span>
              </a>
            </div>
          </div>
        </div>

      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/stats.blade.php ENDPATH**/ ?>