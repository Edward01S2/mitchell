<div class="<?php echo e($block->classes); ?>">
  <div class="bg-center bg-cover bg-c-gray-100" style="background-image:url(<?php echo e($bg ? $bg['url'] : ''); ?>);">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-12 md:pb-24">
        <h2 class="mb-8 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl"><?php echo $title; ?></h2>
        <div class="grid grid-cols-1 gap-6 issue-grid sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-16">
          <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/issue/<?php echo $issue['slug']; ?>" class="flex flex-col transition duration-300 border border-gray-300 issue-item hover:shadow-issue group" style="background-color: <?php echo $issue['color']; ?>;">
              <?php if($images): ?>
                <div class="overflow-hidden">
                  <img class="object-cover w-full h-48 transition duration-300 transform issue-image xl:h-56 group-hover:scale-110" src="<?php echo $issue['img']['url']; ?>" alt="">
                </div>
              <?php endif; ?>
              <div class="p-6 sm:p-8 xl:p-10" style="background-color: <?php echo $issue['color']; ?>; color: <?php echo $issue['font']; ?>;">
                <h4 class="mb-2 text-xl md:text-2xl"><?php echo $issue['name']; ?></h4>
                <p class="leading-tight lg:leading-tight lg:text-lg"><?php echo $issue['desc']; ?></p>
              </div>
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/issues-block.blade.php ENDPATH**/ ?>