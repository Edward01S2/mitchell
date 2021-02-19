<div class="{{ $block->classes }}">
  <div class="bg-c-blue-50">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="flex flex-col py-12 space-y-8 md:space-y-0 md:flex-row md:space-x-8 md:space-x-reverse md:py-16 lg:space-x-12 lg:space-x-reverse lg:py-20 xl:py-24">
        <div class="flex items-center md:w-1/2 md:order-2 xl:justify-center">
          <div class="xl:max-w-md fade-up">
            <h3 class="mb-4 text-2xl leading-tight md:text-3xl lg:text-4xl xl:text-5xl lg:mb-8">{!! $title !!}</h3>
            <div class="mb-4 leading-tight prose max-w-none lg:prose-lg lg:leading-tight xl:prose-xl xl:leading-tight lg:mb-8">{!! $content !!}</div>
            <a href="{!! $link['url'] !!}" class="inline-flex items-center font-medium font-whyte lg:text-lg hover:underline">
              <span class="mr-1">{!! $link['title'] !!}</span>
              <svg class="w-4 h-4 fill-current lg:h-5 lg:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
        <div class="md:w-1/2 md:order-1">
          <img class="object-cover w-full h-auto" src="{!! $img['url'] !!}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
