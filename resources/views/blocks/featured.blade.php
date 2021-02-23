<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12">
      <h2 class="mb-6 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
      <div class="flex flex-col space-y-6 feat-container lg:grid lg:grid-cols-2 lg:grid-rows-3 lg:space-y-0 lg:gap-8 xl:gap-x-24 2xl:gap-x-32">
        @foreach($posts as $post)
          {{-- @dump($post['term']) --}}
          @if($loop->first)
            <div class="pb-6 border-b border-gray-200 feat-item lg:row-span-3 lg:border-0 group">
              <div class="overflow-hidden">
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="overflow-hidden">
                  <img class="object-cover object-center w-full h-48 transition duration-300 transform md:h-64 xl:h-72 group-hover:scale-110" src="{!! $post['image'] !!}" alt="">
                </a>
              </div>
              <div>
                @if($post['term'] && $term = $post['term'][0])
                  <a href="/issue/{!! $term->slug !!}" class="inline-block px-4 py-1 mt-4 text-xs font-medium font-whyte lg:mt-6" style="background-color: {!! get_field('color', $term) !!}; color: {!! get_field('font', $term) !!}">{!! $term->name !!}</a>
                @endif
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }}>
                  <h3 class="mt-4 mb-4 text-xl lg:text-2xl group-hover:text-gray-500">{!! $post['title'] !!}</h3>
                </a>
                <div class="mb-4 leading-snug prose max-w-none line-clamp-5 lg:prose-lg lg:leading-normal">{!! $post['excerpt'] !!}</div>
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="border-b border-transparent font-whyte hover:border-c-blue-200">Read more</a>
              </div>
            </div>
          @else
            <div class="pb-6 border-b border-gray-200 feat-item md:flex md:space-x-6 group">
              <div class="hidden overflow-hidden md:block md:flex-shrink-0">
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="block w-24 h-24 overflow-hidden">
                  <img class="object-cover object-center w-24 h-24" src="{!! ($post['image']) ? $post['image'] : $random !!}" alt="">
                </a>
              </div>
              <div>
                @if($post['term'] && $term = $post['term'][0])
                  <a href="/issue/{!! $term->slug !!}" class="inline-block px-4 py-1 text-xs font-medium font-whyte md:mb-2" style="background-color: {!! get_field('color', $term) !!}; color: {!! get_field('font', $term) !!}">{!! $term->name !!}</a>
                @endif
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }}>
                  <h3 class="mt-4 mb-4 text-xl md:mb-2 md:mt-0 group-hover:text-gray-500">{!! $post['title'] !!}</h3>
                </a>
                <div class="mb-4 leading-snug prose max-w-none line-clamp-5 md:line-clamp-4 md:mb-2 xl:line-clamp-3">{!! $post['excerpt'] !!}</div>
                <a href="{!! $post['url'] !!}" {{ $post['external'] ? 'target=_blank' : ''  }} class="border-b border-transparent font-whyte hover:border-c-blue-200">Read more</a>
              </div>
            </div>
          @endif

        @endforeach
      </div>
    </div>
  </div>
  
  {{-- @dump($posts) --}}
</div>
