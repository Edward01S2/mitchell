<div class="{{ $block->classes ?? '' }}">
  <div class="bg-center bg-cover bg-c-gray-200" style="background-image: url('{!! $bg['url'] !!}')">
    <div class="container px-6 pb-16 mx-auto pt-28 md:pt-32 lg:px-8 lg:pt-36 lg:pb-20">
      <div class="text-white md:w-3/5 lg:w-1/2">
        @isset($pretitle)
          <div class="mb-2 text-xl tracking-widest uppercase font-whyte">{!! $pretitle !!}</div>
        @endisset
        <h1 class="mb-2 text-4xl md:text-5xl lg:text-6xl xl:text-7xl">{!! $title !!}</h1>
        <div class="lg:text-lg lg:max-w-sm xl:max-w-md">{!! $content !!}</div>
        @isset($video)
          <a class="flex items-center mt-6 text-sm font-medium text-black uppercase font-whyte" href="{!! $video_url !!}" data-lity>
            <div class="p-2 bg-white rounded-full">
              <svg class="pl-1 text-black fill-current w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
            </div>
            <span class="mt-1 ml-4">Watch the Video</span>
          </a>
        @endisset
      </div>
    </div>
  </div>

  <div>
    <InnerBlocks />
  </div>
</div>
