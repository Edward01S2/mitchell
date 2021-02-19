<div class="<?php echo e($block->classes); ?>">
  <div class="container px-6 mx-auto lg:px-8">

    <div class="py-12 lg:py-20">
      <div class="bg-center bg-cover bg-c-blue-300" style="background-image:url(<?php echo $form_bg['url']; ?>);">
        <div class="p-4 py-8 text-white sm:px-16 sm:py-12 md:max-w-xl md:mx-auto lg:max-w-2xl lg:py-20">
          <h2 class="mb-4 text-2xl text-center md:text-3xl md:mb-8 lg:text-4xl xl:mb-12 xl:text-5xl"><?php echo $form_title; ?></h2>
          <div class="text-black contact-form font-whyte">
            <?php echo $__env->make('partials.form', ['form' => $form], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
      </div>  
    </div>

    <div class="pb-12 sm:pb-16 lg:pb-20">
      <div class="flex flex-col sm:flex-row">
        <div class="flex flex-col mb-12 space-y-6 font-whyte sm:w-1/2 sm:mb-0 lg:space-y-10 xl:space-y-12">
          <div>
            <div class="mb-4 text-sm text-gray-400 lg:text-base xl:text-lg">Phone</div>
            <a class="text-xl font-bold border-b border-gray-400 text-c-blue-300 font-whyte hover:text-c-blue-200 lg:text-2xl xl:text-3xl" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
          </div>
          <div>
            <div class="mb-4 text-sm text-gray-400 lg:text-base xl:text-lg">Email</div>
            <a class="text-xl font-bold border-b border-gray-400 text-c-blue-300 font-whyte hover:text-c-blue-200 lg:text-2xl xl:text-3xl" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
          </div>
          <div>
            <div class="mb-4 text-sm text-gray-400 lg:text-base xl:text-lg">Address</div>
            <a class="text-xl font-bold text-c-blue-300 font-whyte hover:text-c-blue-200 lg:text-2xl xl:text-3xl" href="<?php echo $address_link; ?>" target="_blank">
              <span><?php echo $address_1; ?></span><br/>
              <span class="border-b border-gray-400"><?php echo $address_2; ?></span>
            </a>
          </div>
        </div>
        <a class="aspect-h-4 aspect-w-4 sm:w-1/2 sm:aspect-none contact-map" href="<?php echo $address_link; ?>" target="_blank">
          <img class="object-cover object-center sm:w-full sm:h-full" src="<?php echo $map['url']; ?>" alt="">
        </a>
      </div>
    </div>

  </div>
</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/contact.blade.php ENDPATH**/ ?>