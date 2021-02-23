<div class="{{ $block->classes }}">
  <div class="bg-center bg-cover bg-c-gray-100" style="background-image:url({{ $bg ? $bg['url'] : '' }});">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-12 md:pb-24">
        <h2 class="mb-8 text-2xl md:text-3xl md:mb-12 lg:text-4xl xl:text-5xl">{!! $title !!}</h2>
        <div class="grid grid-cols-1 gap-6 issue-grid sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-16">
          @foreach($issues as $issue)
            <a href="/issue/{!! $issue['slug'] !!}" class="flex flex-col transition duration-300 border border-gray-300 issue-item hover:shadow-issue group" style="background-color: {!! $issue['color'] !!};">
              @if($images)
                <div class="overflow-hidden">
                  <img class="object-cover w-full h-48 transition duration-300 transform issue-image xl:h-56 group-hover:scale-110" src="{!! $issue['img']['url'] !!}" alt="">
                </div>
              @endif
              <div class="p-6 sm:p-8 xl:p-10" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
                <h4 class="mb-2 text-xl md:text-2xl">{!! $issue['name'] !!}</h4>
                <p class="leading-tight lg:leading-tight lg:text-lg">{!! $issue['desc'] !!}</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
