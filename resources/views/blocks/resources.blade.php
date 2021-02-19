<div class="{{ $block->classes }}">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-12 md:pb-24 xl:py-36">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8 xl:gap-16 xl:max-w-5xl xl:mx-auto">
        @if($cats)
          @foreach($cats as $issue)
            @if($issue['name'] !== 'Uncategorized')
              <a href="/category/{!! $issue['slug'] !!}" class="flex flex-col hover:shadow-issue issue-item" style="background-color: {!! $issue['color'] !!};">
                <div class="issue-image">
                  <img class="object-cover w-full h-48 xl:h-56" src="{!! $issue['img']['url'] !!}" alt="">
                </div>
                <div class="p-6 sm:p-8 xl:p-10" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
                  <h4 class="mb-2 text-xl md:text-2xl">{!! $issue['name'] !!}</h4>
                  <p class="lg:leading-snug lg:text-lg">{!! $issue['desc'] !!}</p>
                </div>
              </a>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>