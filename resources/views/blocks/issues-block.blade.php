<div class="{{ $block->classes }}">
  <div class="bg-c-gray-100">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-12 md:pb-24">
        <h2 class="mb-8 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-16">
          @foreach($issues as $issue)
            <a href="/issues/{!! $issue['slug'] !!}" class="flex flex-col shadow-md md:shadow-lg">
              <div>
                <img class="object-cover w-full h-48 xl:h-56" src="{!! $issue['img']['url'] !!}" alt="">
              </div>
              <div class="p-6" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
                <h4 class="mb-2 text-xl md:text-2xl">{!! $issue['name'] !!}</h4>
                <p>{!! $issue['desc'] !!}</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
