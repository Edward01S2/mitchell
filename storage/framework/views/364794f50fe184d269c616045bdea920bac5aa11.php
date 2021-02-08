<?php if($pagi->hasPages()): ?>
  <nav class="flex items-center justify-center" role="navigation" aria-label="pagination">
    <?php if(! $pagi->onFirstPage()): ?>
      <a
        href="<?php echo e($pagi->previousPageUrl()); ?>"
        rel="prev"
        aria-label="Previous Page"
        class="inline-flex items-center px-4 py-1 font-bold font-whyte text-c-blue-200 hover:underline lg:text-lg"
      >
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span>Previous Page</span>
      </a>
    <?php endif; ?>

    

    <?php if($pagi->hasMorePages()): ?>
      <a
        href="<?php echo e($pagi->nextPageUrl()); ?>"
        rel="next"
        aria-label="Next Page"
        class="inline-flex items-center px-4 py-1 font-bold font-whyte text-c-blue-200 hover:underline lg:text-lg"
      >
        <span>Next Page</span>
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    <?php endif; ?>
  </nav>
<?php endif; ?>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/components/pagination.blade.php ENDPATH**/ ?>