<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12">
      <h2 class="mb-6 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
      <div class="flex flex-col space-y-6 feat-container lg:grid lg:grid-cols-2 lg:gap-8 lg:space-y-0 lg:gap-x-12 xl:gap-16 xl:gap-x-24">
        @foreach($items as $post)
          {{-- @dump($post['term']) --}}
            <div class="pb-6 border-b border-gray-200 feat-item md:flex md:space-x-6 group lg:border-0 lg:pb-0">
              <div class="hidden overflow-hidden md:block md:flex-shrink-0">
                <a href="{!! $post['link'] !!}" class="block w-24 h-24 overflow-hidden">
                  <img class="object-cover object-center w-24 h-24" src="{!! $post['image']['url'] !!}" alt="">
                </a>
              </div>
              <div class="md:-mt-1">
                <a href="{!! $post['link'] !!}">
                  <h3 class="mt-4 mb-4 text-xl md:mb-2 md:mt-0 group-hover:text-gray-500">{!! $post['title'] !!}</h3>
                </a>
                <div class="mb-4 leading-snug prose max-w-none md:mb-2 lg:prose-sm lg:leading-snug xl:prose xl:leading-snug">{!! $post['description'] !!}</div>
                <a href="{!! $post['link'] !!}" class="border-b border-transparent font-whyte hover:border-c-blue-200">Read more</a>
              </div>
            </div>

        @endforeach
      </div>
    </div>
  </div>
  
  {{-- @dump($posts) --}}
</div>
