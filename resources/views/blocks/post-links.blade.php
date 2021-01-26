<div class="{{ $block->classes }}">
  @if($links)
    <div class="flex flex-col items-center space-y-4 post-links">
      @foreach($links as $link)
        @if($link['file'])
          <a href="{!! $link['file']['url'] !!}" target="_blank" class="flex items-center justify-center w-3/4 px-4 pt-3 pb-1 font-medium text-center no-underline font-whyte">
            {!! $link['title'] !!}
            <svg class="w-5 h-5 mb-1 ml-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        @else
          <a href="{!! $link['link']['url'] !!}" target="_blank" class="w-3/4 px-4 pt-3 pb-1 font-medium text-center no-underline font-whyte">{!! $link['link']['title'] !!}</a>
        @endif
      @endforeach
    </div>
  @endif

</div>
