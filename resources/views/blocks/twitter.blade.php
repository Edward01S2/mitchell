<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12 lg:py-16 xl:py-24">
      <div class="p-6 border border-gray-200 shadow-md md:p-12 lg:max-w-2xl lg:mx-auto xl:max-w-3xl">
        <div class="">
          @svg($logo['url'], 'h-12 w-12 mx-auto mb-4')
        </div>
        <div class="mb-6 text-lg text-center font-whyte md:text-xl lg:text-2xl xl:text-3xl">{!! $title !!} <span><a class="text-c-blue-100 hover:underline" href="{!! $twitter['url'] !!}" target="_blank">{!! $twitter['title'] !!}</a></span></div>
        <div class="font-whyte twitter-container">
          <?php echo do_shortcode('[custom-twitter-feeds]');  ?>
        </div>
      </div>
    </div>
  </div>
</div>
