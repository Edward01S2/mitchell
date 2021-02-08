<div class="<?php echo e($block->classes); ?>">
  <?php if($links): ?>
    <div class="flex flex-col items-center space-y-4 post-links md:flex-row md:space-y-0 md:flex-wrap md:justify-center md:items-start lg:grid lg:grid-cols-3 lg:gap-6 xl:gap-12 lg:pt-8">
      <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($link['file']): ?>
          <a href="<?php echo $link['file']['url']; ?>" target="_blank" class="flex items-center justify-center w-3/4 px-4 py-2 font-medium text-center no-underline font-whyte md:w-2/5 md:mr-6 md:mb-6 xl:text-base lg:text-sm lg:py-3 lg:m-0 lg:w-full">
            <?php echo $link['title']; ?>

            <svg class="w-5 h-5 ml-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        <?php else: ?>
          <a href="<?php echo $link['link']['url']; ?>" target="_blank" class="w-3/4 px-4 py-2 font-medium text-center no-underline font-whyte md:w-2/5 md:mr-6 lg:py-3 md:mb-6 lg:m-0 lg:w-full lg:text-sm xl:text-base"><?php echo $link['link']['title']; ?></a>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  <?php endif; ?>

</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/post-links.blade.php ENDPATH**/ ?>