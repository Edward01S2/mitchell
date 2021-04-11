<nav id="nav" x-data="{open: false, issues: false, search: false, analysis: false, events: false, about: false, contact: false, donate: false}" class="absolute top-0 left-0 right-0 z-50 w-full" :class="{'bg-white': search || issues || analysis || events || about || donate || contact || open}">
  <div class="container z-40 px-6 py-2 mx-auto sm:py-0 lg:px-8">
    <div class="flex items-stretch justify-between">

      <div class="relative z-30 md:flex-shrink-0">
        <div class="flex items-stretch flex-shrink-0 md:justify-center">
          <a href="{!! home_url('/') !!}" class="hover:opacity-50 sm:py-2">
            <img id="logo-main" class="w-auto h-28 lg:h-36 xl:h-48" src="{!! $logo['url'] !!}" alt="{{ $siteName }}" />
          </a>
        </div>
      </div>
      <?php $filter = ['Home', 'Follow']; ?>
      <div class="items-stretch hidden nav-container md:flex">
        @foreach ($navigation as $item)
          @if(!in_array($item->label, $filter))
            <div class="flex items-center" @mouseover="{!! strtolower($item->label) !!} = true" x-on:mouseleave="{!! strtolower($item->label) !!} = false">
              {{-- @if($item->label === "Issues")
                <a class="z-30 flex items-center px-3 py-1 mx-3 transition duration-100 cursor-pointer lg:pr-2 lg:pl-4 lg:mx-4 focus:outline-none bg-c-blue-100 group-hover:bg-c-blue-200" href="{!! $item->url !!}" >
                  <div class="text-sm text-white nav-text font-whyte lg:text-base">{{ $item->label }}</div>
                  <svg class="w-6 h-6 ml-2 text-white transform fill-current md:hidden lg:block" :class="{'rotate-180': issues }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </a>
              @else --}}
                <a class="px-2.5 cursor-pointer lg:px-4 focus:outline-none group" href="{!! $item->url !!}">
                  <div class="text-sm tracking-widest text-white nav-text font-whyte lg:text-base group-hover:text-c-blue-100" :class="{'text-black': search || issues || analysis || events || about || donate || contact, 'text-white': !open, 'text-white' : !issues && !search && !analysis && !events && !about && !donate && !contact}">{{ $item->label }}</div>
                </a>
              {{-- @endif --}}

              
                <div :class="{'block': {!! strtolower($item->label) !!}, 'hidden': !{!! strtolower($item->label) !!} }" class="absolute top-0 left-0 right-0 z-20 w-full bg-white border-b border-gray-200 mt-28 lg:mt-32 xl:mt-44" x-cloak>
                  <div class="container px-6 mx-auto lg:px-8">
                    <div class="relative grid grid-cols-2 gap-8 px-10 py-8 lg:gap-12 xl:px-16 xl:py-12 xl:gap-24">
            
                      <div class="overflow-hidden aspect-h-9 aspect-w-16">
                        @isset(${strtolower($item->label).'_img'})
                          <img class="object-cover object-center w-full h-full transition duration-300 transform hover:scale-110" src="{!! ${strtolower($item->label).'_img'}['url'] !!}" alt="">
                        @endisset
                      </div>
                      <div class="">
                        <a class="nav-link text-xl tracking-widest font-medium mb-2 flex justify-between xl:mb-4 items-center focus:outline-none font-whyte group relative z-30 transition duration-150 text-black hover:text-c-blue-200 lg:text-2xl xl:text-3xl {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" href="{{ $item->url }}" target="{!! $item->target !!}">
                          <div class="nav-text group-hover:font-bold">{!! $item->label !!}</div>
                          <svg class="w-6 h-6 text-white group-hover:text-c-blue-200 xl:h-7 xl:w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                          </svg>
                        </a>
                        <div class="flex flex-col border-t border-b divide-y divide-c-gray-25 border-c-gray-25">
                          @if($item->children)
                            @foreach($item->children as $child)
                              <a class="nav-link text-lg group flex items-center justify-between hover:bg-c-blue-100 tracking-widest py-2 focus:outline-none font-whyte group relative z-30 transition duration-150 text-c-gray-400 lg:text-xl xl:text-2xl {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}" href="{{ $child->url }}" target="{!! $child->target !!}">
                                <div class="pl-4 nav-text group-hover:text-white xl:pl-6">{{ html_entity_decode($child->label) }}</div>
                                <svg class="w-6 h-6 text-c-gray-25 group-hover:text-white xl:h-7 xl:w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
            </div>
          @endif

          @if($item->label === 'Follow')
            <a class="flex items-center px-3 cursor-pointer lg:px-5 focus:outline-none group" href="{!! $item->url !!}" :class="{'text-black': search || issues || analysis || events || about || donate || contact, 'text-white': !open, 'text-white' : !issues && !search && !analysis && !events && !about && !donate && !contact}" x-on:mouseenter="open = false" x-on:mouseover.away="open = false">
              <div class="text-sm tracking-widest nav-text font-whyte lg:text-base group-hover:text-c-blue-100">{{ $item->label }}</div>
            </a>
          @endif

          
        @endforeach 
        @if(!is_search())
        <div class="flex pl-3 item-center group lg:pl-4" @mouseover="search = true, open = true" x-on:mouseleave="search = false, open = false">
          <button class="z-30 cursor-default focus:outline-none" >
            <svg class="w-5 h-5 fill-current group-hover:text-c-blue-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{'text-black': search || issues || analysis || events || about || donate || contact, 'text-white': !open, 'text-white' : !issues && !search && !analysis && !events && !about && !donate && !contact}">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </button>

          <div :class="{'block': search, 'hidden': !search }" class="absolute top-0 left-0 right-0 w-full mt-32 bg-c-black-100 lg:mt-40 xl:mt-[13rem]" x-cloak>
            <div class="container px-6 mx-auto lg:px-8">
        
              <div  class="relative flex items-center justify-center py-16">

                <div id="search-container" class="flex items-center w-full max-w-lg lg:max-w-xl xl:max-w-2xl">
                  <div class="mr-4 text-2xl font-bold text-white font-whyte xl:text-3xl">Search:</div>
                  <form action="{!! home_url(); !!}" role="search" method="post" id="searchform" class="relative flex-grow">
                    <input type="text" id="s" name="s" value="" autocomplete="off" class="w-full py-2 pl-4 pr-6 focus:outline-none font-whyte" placeholder="Search Keyword">
                    {{-- <input type="hidden" name="post_type" value="sfwd-courses"> --}}
                    <button class="absolute bottom-0 right-0 mb-3 mr-4" type="submit" id="searchsubmit">
                      <svg class="w-4 h-4 text-black fill-current hover:text-c-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                    </button>
                  </form>
                </div>
              </div>
        
            </div>
          </div>

        </div>
        @endif
      </div>
      
      <div class="flex items-center md:hidden">
        <!-- Mobile menu button -->
        <button @click="open = !open" class="inline-flex items-center justify-center p-1 mr-auto text-white transition duration-150 ease-in-out rounded-md bg-c-blue-100 focus:outline-none hover:text-c-red-100" aria-label="Main menu" aria-expanded="false">
          <!-- Icon when menu is closed. -->
          <svg :class="{'hidden': open, 'block': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <!-- Icon when menu is open. -->
          <svg :class="{'block': open, 'hidden': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

    </div>
  </div>





  

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div :class="{'block': open, 'hidden': !open }" class="shadow-md bg-c-black-100 md:hidden" x-cloak>
    <div @click.away="open = false" class="py-8 md:px-2">
      <ul class="flex flex-col space-y-6">
        @foreach ($navigation as $item)
          @if($item->children)
            <li class="group relative px-6 transition duration-150 ease-in-out flex items-center flex-wrap {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" x-data="{drop: false}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="{{ $item->url }}">
                {{ $item->label }}
              </a>
              <button class="ml-6 focus:outline-none" @click="drop = !drop">
                <svg class="w-6 h-6 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              <div :class="{'block': drop, 'hidden': !drop }" class="w-full" x-cloak>
                <ul class="flex flex-col pt-3 pl-4 space-y-3">
                  @foreach($item->children as $child)
                    <a class="text-lg text-white font-whyte" href="{!! $child->url !!}">{!! html_entity_decode($child->label) !!}</a>
                  @endforeach
                </ul>
              </div>
            </li>
          @else
            <li class="group relative px-6 transition duration-150 ease-in-out {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="{{ $item->url }}">
                {{ $item->label }}
              </a>
            </li>
          @endif
        @endforeach
        <li class="relative px-6 transition duration-150 ease-in-out group">
          <a @click="open = false" class="items-center inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="/search">
            Search
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- @dump($issues) --}}
{{-- @dump($navigation) --}}