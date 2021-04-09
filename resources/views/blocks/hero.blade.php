<div class="{{ $block->classes ?? '' }}">
  <div class="relative bg-center bg-cover bg-c-gray-200 md:min-h-20 lg:min-h-24 xl:min-h-30 hero-bg" style="background-image: url('{!! ($bg) ? $bg : ''; !!}')">
    <div class="absolute inset-0 z-10 w-full h-full hero-gradient"></div>
    <div class="container relative z-20 px-6 pt-40 pb-16 mx-auto lg:px-8 lg:pt-48 lg:pb-20 xl:pt-64">
      <div class="text-white md:w-3/5 lg:w-1/2">
        @if(isset($pretitle) && $pretitle)
          <div class="text-xl tracking-widest uppercase md:mb-0 font-whyte md:text-2xl xl:max-w-lg 2xl:max-w-xl hero-pretitle">{!! $pretitle !!}</div>
        @endif
        <h1 class="mb-2 text-4xl md:text-5xl lg:text-6xl xl:text-7xl hero-title">{!! $title !!}</h1>
        @if(isset($content) && $content)
          <div class="lg:text-lg lg:max-w-sm xl:max-w-md hero-content">{!! $content !!}</div>
        @endif
        @if(isset($video) && $video)
          <a class="flex items-center mt-6 text-sm font-medium text-black uppercase font-whyte hover:text-white hero-video" href="{!! $video_url !!}" data-lity>
            <div class="p-2 bg-white rounded-full">
              <svg class="pl-1 text-black fill-current w-7 h-7 md:w-8 md:h-8 lg:w-10 lg:h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
            </div>
            <span class="mt-1 ml-4">Watch the Video</span>
          </a>
        @endif
      </div>
    </div>
  </div>
</div>
