<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12 md:pb-16 lg:pb-20 lg:pt-16">
      <div class="mb-8 md:flex md:items-center md:justify-between md:mb-12">
        <h2 class="mb-4 text-2xl md:text-3xl md:mb-0 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
        @if($link)
        <a href="{!! $link['url'] !!}" class="inline-flex items-center px-8 py-3 border font-whyte text-c-gray-400 border-c-gray-75 hover:text-white hover:bg-c-black-100 hover:border-c-black-100">
          <span class="mr-8 md:mr-12 lg:mr-16">{!! $link['title'] !!}</span>
          <svg class="w-6 h-4 lg:w-7 lg:h-5" viewBox="0 0 24 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.3536 4.35355C23.5488 4.15829 23.5488 3.84171 23.3536 3.64645L20.1716 0.464466C19.9763 0.269204 19.6597 0.269204 19.4645 0.464466C19.2692 0.659728 19.2692 0.976311 19.4645 1.17157L22.2929 4L19.4645 6.82843C19.2692 7.02369 19.2692 7.34027 19.4645 7.53553C19.6597 7.7308 19.9763 7.7308 20.1716 7.53553L23.3536 4.35355ZM0 4.5H23V3.5H0V4.5Z" fill="currentColor"/>
          </svg>
        </a>
        @endif
      </div>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-y-10 lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4 xl:gap-x-12 2xl:gap-x-20">
        @foreach($posts as $post)
          <div class="md:flex group">
            <div>
              <div class="hidden mb-4 md:block md:flex-shrink-0">
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="block overflow-hidden">
                  <img class="object-cover object-center w-full h-40 transition duration-300 transform group-hover:scale-110" src="{!! $post['image'] !!}" alt="">
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
