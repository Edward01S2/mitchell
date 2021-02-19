<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12 md:pb-16 lg:pb-20 lg:pt-16">
      <h2 class="mb-6 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-y-10 lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4 xl:gap-x-12 2xl:gap-x-20">
        @foreach($posts as $post)
          <div class="md:flex group">
            <div>
              <div class="hidden md:block md:flex-shrink-0">
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }}>
                  <img class="object-cover object-center w-full h-40 mb-4" src="{!! $post['image'] !!}" alt="">
                </a>
              </div>
              <div>
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }}>
                  <h3 class="mb-3 text-xl md:mb-2 md:mt-0 group-hover:text-gray-500">{!! $post['title'] !!}</h3>
                </a>
                <div class="mb-4 leading-snug prose max-w-none line-clamp-5 md:line-clamp-4 md:mb-2 2xl:line-clamp-5">{!! $post['excerpt'] !!}</div>
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="inline-flex items-center text-c-blue-200 font-whyte">
                  <span class="mr-1 group-hover:underline">Read more</span>
                  <svg class="w-4 h-4"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- @dump($posts) --}}
