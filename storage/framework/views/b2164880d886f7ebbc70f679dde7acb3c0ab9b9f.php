<div class="<?php echo e($block->classes ?? ''); ?>">
  <div class="relative bg-center bg-cover bg-c-gray-200" style="background-image: url('<?php echo ($bg) ? $bg : '';; ?>')">
    <div class="absolute inset-0 z-10 w-full h-full bg-black opacity-10"></div>
    <div class="container relative z-20 px-6 pb-16 mx-auto pt-28 md:pt-32 lg:px-8 lg:pt-36 lg:pb-20">
      <div class="text-white md:w-3/5 lg:w-1/2">
        <?php if(isset($pretitle) && $pretitle): ?>
          <div class="mb-2 text-xl tracking-widest uppercase font-whyte"><?php echo $pretitle; ?></div>
        <?php endif; ?>
        <h1 class="mb-2 text-4xl md:text-5xl lg:text-6xl xl:text-7xl"><?php echo $title; ?></h1>
        <?php if(isset($content) && $content): ?>
          <div class="lg:text-lg lg:max-w-sm xl:max-w-md"><?php echo $content; ?></div>
        <?php endif; ?>
        <?php if(isset($video) && $video): ?>
          <a class="flex items-center mt-6 text-sm font-medium text-black uppercase font-whyte" href="<?php echo $video_url; ?>" data-lity>
            <div class="p-2 bg-white rounded-full">
              <svg class="pl-1 text-black fill-current w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
            </div>
            <span class="mt-1 ml-4">Watch the Video</span>
          </a>
        <?php endif; ?>
    </div>
  </div>

  <div>
    <InnerBlocks />
  </div>
</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/hero.blade.php ENDPATH**/ ?>