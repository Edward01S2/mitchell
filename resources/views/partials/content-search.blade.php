<article @php(post_class()) x-data="{img: {!! (!$feat) ? 'false' : 'true'; !!}}">
  <div class="flex flex-col p-6 px-0 border-container md:flex-row md:space-x-12 xl:p-8 bg-c-blue-300" > {{--  :class="{ 'md:py-12 xl:py-16' : !img }" --}}
    <div class="md:w-1/3 lg:w-1/4">

      <a href="{{ $link }}" {{ $external ? 'target="_blank"' : '' }}>
        <img class="object-cover object-center w-full h-48 mb-6 md:mb-0" src="{!! ($feat) ? $feat : $random !!}" alt="">
      </a>
 
    </div>
    <div class="text-white md:w-2/3 lg:w-3/4">
      <header class="mb-2">
        <h2 class="text-xl leading-snug text-white entry-title font-whyte line-clamp-3 md:line-clamp-2 lg:text-2xl hover:text-gray-500">
          <a href="{{ $link }}" {{ $external ? 'target="_blank"' : '' }}>
            {!! $title !!}
          </a>
        </h2>
      </header>
      <div class="mb-2 leading-snug prose text-white max-w-none line-clamp-3 xl:prose-lg xl:leading-snug">
        @php(the_excerpt())
      </div>
      <a href="{!! $link !!}" class="inline-flex items-center font-whyte text-c-blue-150 hover:underline" {{ $external ? 'target="_blank"' : '' }}>
        <span class="mr-1">Read More</span>
        <svg class="w-4 h-4 fill-current lg:h-5 lg:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
  </div>
</article>
