<div class="{{ $block->classes }}">
  <div class="grid grid-cols-1 stats-container md:grid-cols-2">
    @foreach($stats as $stat)
      <div class="relative transition duration-300 stat group">

        <div class="absolute inset-0 z-10 w-full h-full transition bg-white opacity-90 group-hover:bg-c-blue-150"></div>
        <img src="{!! $stat['bg']['url'] !!}" alt="" class="absolute inset-0 z-0 object-cover w-full h-full grayscale">

        <div class="relative z-20 md:h-full md:w-full">
          <div class="container px-6 py-12 mx-auto stat-inner-container md:flex md:flex-col md:h-full md:container-none md:max-w-md/2 md:py-16 lg:max-w-lg/2 lg:px-8 xl:max-w-xl/2 xl:py-20 2xl:py-24 2xl:max-w-screen-md">
            <div class="md:flex-grow group-hover:text-white">
              <div class="mb-2 text-5xl font-black font-whyte md:text-6xl">{!! $stat['number'] !!}</div>
              <div class="max-w-xs mb-8 leading-tight font-whyte">{!! $stat['description'] !!}</div>
              <h3 class="text-2xl leading-tight">{!! $stat['title'] !!}</h3>
              <div class="w-3/4 h-px mt-2 mb-4 bg-black md:w-1/2 group-hover:bg-white"></div>
              <p class="mb-8 lg:text-lg lg:leading-tight">{!! $stat['content'] !!}</p>
            </div>
            <div>
              <a href="{!! $stat['link']['url'] !!}" class="inline-flex px-8 py-3 text-white border bg-c-blue-300 font-whyte border-c-blue-300 group-hover:bg-transparent group-hover:border-white">
                <span>{!! $stat['link']['title'] !!}</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    @endforeach
  </div>
</div>
