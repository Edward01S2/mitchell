<div class="<?php echo e($block->classes); ?>">
  <div class="bg-gray-900 bg-center bg-cover" style="background-image:url(<?php echo $bg['url']; ?>);">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-12 text-center text-white md:py-16 lg:py-24 xl:py-32">
        <h3 class="mb-8 text-2xl md:text-3xl lg:text-4xl xl:text-5xl"><?php echo $title; ?></h3>
        <div class="max-w-xs mx-auto md:max-w-sm xl:max-w-md">
          <div class="mb-4 text-black signup-form">
            <?php echo $__env->make('partials.form', ['form' => $form], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div class="lg:px-8 xl:px-12"><?php echo $consent; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/signup.blade.php ENDPATH**/ ?>