<div class="{{ $block->classes }}">
  <div class="bg-center bg-cover bg-c-blue-100" style="background-image: url('{!! $bg['url'] !!}')">
    <div class="container px-6 pb-12 mx-auto pt-28 lg:px-8">
      <div class="text-white">
        @if($pretitle)
          <div class="mb-2 text-xl uppercase font-whyte">{!! $pretitle !!}</div>
        @endif
        <h1 class="text-4xl">{!! $title !!}</h1>
        <div class="">{!! $content !!}</div>
        @if($video)
          <a class="flex items-center mt-6 text-sm font-medium text-black uppercase font-whyte" href="{!! $video_url !!}">
            <div class="p-2 bg-white rounded-full">
              <svg class="pl-1 text-black fill-current w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
            </div>
            <span class="mt-1 ml-4">Watch the Video</span>
          </a>
        @endif
      </div>
    </div>
  </div>

  <div>
    <InnerBlocks />
  </div>
</div>
