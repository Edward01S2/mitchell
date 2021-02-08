<?php if($pagi->hasPages()): ?>
  <nav class="flex items-center my-8" role="navigation" aria-label="pagination">
    <?php if(! $pagi->onFirstPage()): ?>
      <a
        href="<?php echo e($pagi->previousPageUrl()); ?>"
        rel="prev"
        aria-label="Previous Page"
        class="border rounded-sm mr-3 py-1 px-4 hover:bg-blue-600 hover:text-white"
      >&larr; Previous</a>
    <?php endif; ?>

    <ul class="flex">
      <?php $__currentLoopData = $pagi->elements(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
          <li class="disabled" aria-disabled="true">
            <span class="mr-3 py-1">&hellip;</span>
          </li>
        <?php endif; ?>

        <?php if(is_array($element)): ?>
          <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <?php if($page == $pagi->currentPage()): ?>
                <span
                  class="border rounded-sm mr-3 py-1 px-4 bg-blue-600 text-white"
                  aria-current="page"
                ><?php echo e($page); ?></span>
              <?php else: ?>
                <a
                  href="<?php echo e($url); ?>"
                  class="border rounded-sm mr-3 py-1 px-4 hover:bg-blue-600 hover:text-white"
                ><?php echo e($page); ?></a>
              <?php endif; ?>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if($pagi->hasMorePages()): ?>
      <a
        href="<?php echo e($pagi->nextPageUrl()); ?>"
        rel="next"
        aria-label="Next Page"
        class="border rounded-sm mr-3 py-1 px-4 hover:bg-blue-600 hover:text-white"
      >Next &rarr;</a>
    <?php endif; ?>
  </nav>
<?php endif; ?>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/vendor/log1x/pagi/src/resources/views/pagination.blade.php ENDPATH**/ ?>