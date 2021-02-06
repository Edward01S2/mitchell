@if ($pagi->hasPages())
  <nav class="flex items-center justify-center" role="navigation" aria-label="pagination">
    @if (! $pagi->onFirstPage())
      <a
        href="{{ $pagi->previousPageUrl() }}"
        rel="prev"
        aria-label="Previous Page"
        class="inline-flex items-center px-4 py-1 font-bold font-whyte text-c-blue-200 hover:underline lg:text-lg"
      >
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span>Previous Page</span>
      </a>
    @endif

    {{-- <ul class="flex">
      @foreach ($pagi->elements() as $element)
        @if (is_string($element))
          <li class="disabled" aria-disabled="true">
            <span class="py-1 mr-3">&hellip;</span>
          </li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            <li>
              @if ($page == $pagi->currentPage())
                <span
                  class="px-4 py-1 mr-3 text-white bg-blue-600 border rounded-sm"
                  aria-current="page"
                >{{ $page }}</span>
              @else
                <a
                  href="{{ $url }}"
                  class="px-4 py-1 mr-3 border rounded-sm hover:bg-blue-600 hover:text-white"
                >{{ $page }}</a>
              @endif
            </li>
          @endforeach
        @endif
      @endforeach
    </ul> --}}

    @if ($pagi->hasMorePages())
      <a
        href="{{ $pagi->nextPageUrl() }}"
        rel="next"
        aria-label="Next Page"
        class="inline-flex items-center px-4 py-1 font-bold font-whyte text-c-blue-200 hover:underline lg:text-lg"
      >
        <span>Next Page</span>
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    @endif
  </nav>
@endif
