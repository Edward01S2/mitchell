<div class="{!! $bg !!}" x-data="{ search: {!! $search !!} }">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-8">

      {{-- ISSUES FILTER --}}
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 xl:grid-cols-5 event-filters">

        @php
          $issue_get = [];
          if(isset($_GET['evissue'])) {
            $issue_get = explode(',', $_GET[ 'evissue' ]);
          }
          //$evissue = (isset($_GET['evissue']) ? 'true' : 'false');
        @endphp

        <div class="relative" x-data="{ open: false, search: {!! $search !!} }">
          <div>
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
              <div class="pl-6">Issue</div>
              <!-- Heroicon name: solid/chevron-down -->
              <div class="px-3 py-1" :class="{ 'bg-c-blue-150' : search, 'bg-c-blue-300' : !search }">
                <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </div>

        
          <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg" x-show="open" x-on:click.away="open = false" :class="{ 'bg-c-gray-50' : search, 'bg-c-blue-300' : !search }"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-cloak>
            <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <div class="flex flex-col mt-2 space-y-2 font-whyte filters" data-filter="evissue" :class="{ 'text-c-blue-300' : search, 'text-white' : !search }">
                @foreach($issue_filters as $key => $value)
                  <div class="issue-filter">
                    <label class="inline-flex items-center">
                      <input type="checkbox" value="{!! $key !!}" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" {{ in_array($key, $issue_get) ? 'checked' : "" }} />
                      <span class="ml-8 text-lg">{!! $value !!}</span>
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        @php
          $tag_get = [];
          if(isset($_GET['evlabel'])) {
            $tag_get = explode(',', $_GET[ 'evlabel' ]);
          }
          // $evlabel = (isset($_GET['evlabel']) ? 'true' : 'false');
        @endphp

        {{-- @dump($) --}}
        {{-- @dump($tag_filters) --}}
        @if($tag_filters)
          <div class="relative tag-filter-container" x-data="{ open: false, search: {!! $search !!} }">
            <div>
              <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
                <div class="pl-6">{{ $tag_input ? $tag_input : 'Tags' }}</div>
                <!-- Heroicon name: solid/chevron-down -->
                <div class="px-3 py-1" :class="{ 'bg-c-blue-150' : search, 'bg-c-blue-300' : !search }">
                  <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </div>
          
            <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg md:w-200% md:origin-top-right md:right-0 md:left-auto xl:left-0 xl:right-auto xl:w-400%" x-show="open" x-on:click.away="open = false" :class="{ 'bg-c-gray-50' : search, 'bg-c-blue-300' : !search }"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              x-cloak>
              <div class="p-6 lg:p-8" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="flex flex-col mt-2 space-y-6 filters font-whyte" data-filter="evlabel" :class="{ 'text-c-blue-300' : search, 'text-white' : !search }">
                  @isset($tag_filters['top'])
                    <div>
                      <div class="mb-4 text-lg font-bold">{{ $tag_top ? $tag_top : 'Top Tags' }}</div>
                      <div class="flex flex-col space-y-4 md:grid md:grid-cols-2 md:space-y-0 md:gap-6 md:gap-x-12 xl:grid-cols-3">
                        @foreach($tag_filters['top'] as $key => $value)
                          <div class="w-3/4 border filter md:flex md:items-center md:w-full md:h-full border-c-blue-200 bg-c-blue-400">
                            <label class="md:w-full md:h-full md:flex md:items-center">
                              <input type="checkbox" value="{!! $key !!}" class="hidden w-5 h-5 border rounded-sm top-tag bg-c-blue-400 border-c-blue-200" {{ in_array($key, $tag_get) ? 'checked' : "" }}/>
                              <div class="px-6 py-4 text-lg text-center cursor-pointer md:w-full md:leading-tight md:flex md:items-center md:h-full md:justify-center">{!! $value !!}</div>
                            </label>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endisset
                  
                  @isset($tag_filters['tags'])
                    <div>
                      <div class="mb-4 text-lg font-bold">All Tags</div>
                        <div class="md:grid md:grid-cols-2 md:gap-y-2 md:gap-x-12 lg:gap-y-1.5 xl:gap-y-1 xl:grid-cols-3">
                          @foreach($tag_filters['tags'] as $key => $value)
                            <div class="flex items-center filter">
                              <label class="inline-flex items-center">
                                <input type="checkbox" value="{!! $key !!}" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" {{ in_array($key, $tag_get) ? 'checked' : "" }} />
                                <span class="ml-8 text-lg">{!! $value !!}</span>
                              </label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  @endisset
                </div>
              </div>
            </div>
          

        @endif

        {{-- Event Buttons --}}


        <a href="" class="inline-flex items-center justify-center px-3 py-4 font-medium text-white event-time-btn font-whyte bg-c-blue-300 xl:col-start-4" data-filter="future">Upcoming Events</a>
        <a href="" class="inline-flex items-center justify-center px-3 py-4 font-medium text-white event-time-btn font-whyte bg-c-blue-300" data-filter="past">Past Events</a>


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