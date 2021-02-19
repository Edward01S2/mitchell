<div class="<?php echo e($block->classes); ?>">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12 md:pb-24 xl:py-36">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8 xl:gap-16 xl:max-w-5xl xl:mx-auto">
        <?php if($cats): ?>
          <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($issue['name'] !== 'Uncategorized'): ?>
              <a href="/category/<?php echo $issue['slug']; ?>" class="flex flex-col hover:shadow-issue issue-item" style="background-color: <?php echo $issue['color']; ?>;">
                <div class="issue-image">
                  <img class="object-cover w-full h-48 xl:h-56" src="<?php echo $issue['img']['url']; ?>" alt="">
                </div>
                <div class="p-6 sm:p-8 xl:p-10" style="background-color: <?php echo $issue['color']; ?>; color: <?php echo $issue['font']; ?>;">
                  <h4 class="mb-2 text-xl md:text-2xl"><?php echo $issue['name']; ?></h4>
                  <p class="lg:leading-snug lg:text-lg"><?php echo $issue['desc']; ?></p>
                </div>
              </a>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div><?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/resources.blade.php ENDPATH**/ ?>