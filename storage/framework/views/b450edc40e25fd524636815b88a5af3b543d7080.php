<footer class="content-info">

  <div class="py-6 pb-8 bg-c-blue-300 md:py-4">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="md:flex md:justify-between md:items-center">
        <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:space-x-16">
          <a href="<?php echo home_url('/'); ?>" class="flex items-center justify-center hover:opacity-50" target="_blank">
            <img id="logo-main" class="w-auto h-16 md:h-20" src="<?php echo $logo['url']; ?>" alt="<?php echo e($siteName); ?>" />
            <span class="ml-4 font-medium leading-5 tracking-wide text-white uppercase font-whyte md:text-lg md:leading-snug lg:ml-8"><?php echo $logo_text; ?></span>
          </a>
          <div class="flex items-center justify-center">
            <img class="w-auto h-14 md:order-2 lg:h-16" src="<?php echo $afa_logo['url']; ?>" />
            <span class="ml-4 font-medium leading-5 tracking-wide text-white uppercase font-whyte md:text-lg md:leading-snug sm:ml-6 md:order-1 md:ml-0 md:mr-6"><?php echo $footer_text_2; ?></span>
          </div>
        </div>
        <?php if($social): ?>
          <div class="flex items-center justify-center mt-6 space-x-4 md:mt-0">
            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo $item['url']; ?>" target="_blank" class="hover:opacity-75">
                <?php echo e(get_svg($item['icon']['url'], 'w-6 h-6 fill-current')); ?>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="bg-c-gray-100">
    <div class="container px-6 mx-auto lg:px-8">

      <div class="grid grid-cols-2 gap-6 py-6 md:grid-cols-7 md:gap-8 lg:py-8 xl:py-16">

        <div id="subscribe" class="col-span-2 font-whyte md:col-span-3 md:col-start-5 xl:col-span-2">
          <div class="mb-3 nav-head lg:mb-6">Follow</div>
          <div class="mb-3 footer-form lg:mb-4">
            <?php echo $__env->make('partials.form', ['form' => $form], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div class="text-black lg:pr-6 opacity-40"><?php echo $form_text; ?></div>
        </div>

        <div class="flex flex-col space-y-4 md:col-span-2 md:col-start-1 md:row-start-1 md:space-y-8 xl:grid xl:grid-cols-3 xl:space-y-0 xl:col-span-3 xl:gap-8">
          <div class="flex flex-col space-y-2">
            <a href="<?php echo $navigation[0]->url; ?>" class="nav-head"><?php echo $navigation[0]->label; ?></a>
            <?php if($items = $navigation[0]->children): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo $item->url; ?>" class="nav-head"><?php echo $item->label; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>

          <div class="flex flex-col space-y-1">
            <a href="<?php echo $navigation[1]->url; ?>" class="mb-2 nav-head"><?php echo $navigation[1]->label; ?></a>
            <?php if($items = $navigation[1]->children): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo $item->url; ?>" class="nav-sub"><?php echo $item->label; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>

          <div class="flex flex-col space-y-1">
            <a href="<?php echo $navigation[2]->url; ?>" class="mb-2 nav-head"><?php echo $navigation[2]->label; ?></a>
            <?php if($items = $navigation[2]->children): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo $item->url; ?>" class="nav-sub"><?php echo $item->label; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="flex flex-col space-y-4 md:col-span-2 md:col-start-3 md:row-start-1 md:space-y-8 xl:grid xl:grid-cols-2 xl:space-y-0 xl:col-span-2 xl:gap-8">
          <div class="flex flex-col space-y-1">
            <a href="<?php echo $navigation[3]->url; ?>" class="mb-2 nav-head"><?php echo $navigation[3]->label; ?></a>
            <?php if($items = $navigation[3]->children): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo $item->url; ?>" class="nav-sub"><?php echo $item->label; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>

          <div class="flex flex-col space-y-1">
            <a href="<?php echo $navigation[4]->url; ?>" class="mb-2 nav-head"><?php echo $navigation[4]->label; ?></a>
            <?php if($items = $navigation[4]->children): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo $item->url; ?>" class="nav-sub"><?php echo $item->label; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

      </div>

    </div>

    <div class="py-4 text-sm border-t border-gray-200 font-whyte md:py-5">
      <div class="container px-6 mx-auto lg:px-8">
        <div class="md:flex md:items-center md:justify-between lg:justify-center lg:space-x-20 xl:space-x-24">
          <div class="mb-2 text-center md:mb-0">
            <span>&copy; <?php echo esc_attr( date( 'Y' ) ); ?></span>
            <?php echo $copy; ?>

          </div>
          <div class="flex justify-center space-x-4 md:space-x-6">
            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo $link['link']['url']; ?>" class="text-c-gray-400 hover:underline"><?php echo $link['link']['title']; ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>

</footer>

<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/partials/footer.blade.php ENDPATH**/ ?>