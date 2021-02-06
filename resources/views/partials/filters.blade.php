<div class="bg-c-gray-50">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-8">

      {{-- ISSUES FILTER --}}
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3 xl:grid-cols-4">

        <div class="relative" x-data="{ open: false }">
          <div>
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
              <div class="pl-6">Issue</div>
              <!-- Heroicon name: solid/chevron-down -->
              <div class="px-3 py-1 bg-c-blue-300">
                <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </div>
        
          <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg bg-c-blue-300" x-show="open" x-on:click.away="open = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
          x-cloak>
            <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <div class="flex flex-col mt-2 space-y-2 text-white font-whyte">
                @foreach($issue_filters as $key => $value)
                  <div>
                    <label class="inline-flex items-center">
                      <input type="checkbox" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" />
                      <span class="ml-8 text-lg">{{ $value }}</span>
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        @php
          $tag_get = [];
          if(isset($_GET['label'])) {
            $tag_get = explode(',', $_GET[ 'label' ]);
          }
        @endphp

        {{-- @dump($) --}}

        <div class="relative tag-filter-container" x-data="{ open: false }">
          <div>
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
              <div class="pl-6">Tags</div>
              <!-- Heroicon name: solid/chevron-down -->
              <div class="px-3 py-1 bg-c-blue-300">
                <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </div>
        
          <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg bg-c-blue-300" x-show="open" x-on:click.away="open = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
          x-cloak>
            <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <div class="flex flex-col mt-2 space-y-6 text-white tag-filters font-whyte">
                @isset($tag_filters['top'])
                  <div>
                    <div class="mb-4 text-lg font-bold">Top Tags</div>
                    <div class="flex flex-col space-y-4">
                      @foreach($tag_filters['top'] as $key => $value)
                        <div class="filter" data-filter="label">
                          <label class="">
                            <input type="checkbox" value="{!! $key !!}" class="hidden w-5 h-5 border rounded-sm top-tag bg-c-blue-400 border-c-blue-200" {{ in_array($key, $tag_get) ? 'checked' : "" }}/>
                            <div class="w-3/4 px-6 py-2 text-lg text-center border cursor-pointer bg-c-blue-400 border-c-blue-200">{{ $value }}</div>
                          </label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endisset
                
                @isset($tag_filters['tags'])
                <div>
                  <div class="mb-4 text-lg font-bold">All Tags</div>
                    @foreach($tag_filters['tags'] as $key => $value)
                      <div class="filter" data-filter="label">
                        <label class="inline-flex items-center">
                          <input type="checkbox" value="{!! $key !!}" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" {{ in_array($key, $tag_get) ? 'checked' : "" }} />
                          <span class="ml-8 text-lg">{{ $value }}</span>
                        </label>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endisset
      
            </div>
          </div>
        </div>

      </div> <!--- END GRID --->

    </div>
  </div>
</div>

{{-- @php
  if(is_archive()) {
    $term = get_queried_object();
    $archive = $term->taxonomy;
    $url = home_url($term->taxonomy) . '/' . $term->category_nicename;
  }  

@endphp --}}

{{-- @dump($term)
@dump($url) --}}


{{-- @dump($tag_filters) --}}
{{-- @dump(get_queried_object()) --}}