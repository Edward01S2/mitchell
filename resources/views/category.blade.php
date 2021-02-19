@extends('layouts.app')

@section('content')

  @include('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content])
  
  @if (! have_posts())
    <div class="container px-6 py-12 mx-auto lg:px-8">
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
    </div>
  @endif

  @if(have_posts())
    {{-- @dump($tag_filters) --}}
    @include('partials.filters', ['bg' => 'bg-c-gray-50', 'search' => 'false'])
    
    <div class="container px-6 pb-12 mx-auto lg:px-8 md:pt-8 lg:pt-12 xl:pb-16">
      <div class="flex flex-col divide-y divide-gray-200 posts-wrapper lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
      </div>

      {!! $pagi !!}
    </div>
  @endif

  @if($terms)
    <div class="overflow-hidden bg-gray-800 bg-center bg-cover" style="background-image:url({!! $more_bg['url'] !!});">
      <div class="">
        <div class="py-12 pb-16 md:pt-16 md:pb-24 lg:pt-20 lg:pb-32 xl:pt-28">
          <div class="container px-6 mx-auto lg:px-8">
            <h2 class="mb-8 text-3xl text-white md:text-3xl md:mb-12 lg:text-4xl lg:mb-16">{!! $more_title !!}</h2>
          </div>

          <div class="relative">
            <div class="container mx-auto swiper-container tax-slider">
              <div class="px-6 lg:px-8 swiper-wrapper">

                @foreach($terms as $issue)
                  <a href="/{!! $more_tax->taxonomy !!}/{!! $issue['slug'] !!}" class="flex flex-col issue-item swiper-slide md:max-w-xs lg:max-w-sm" style="background-color: {!! $issue['color'] !!};">
                    <div>
                      <img class="object-cover w-full h-48 xl:h-56 issue-image" src="{!! $issue['img']['url'] !!}" alt="">
                    </div>
                    <div class="p-6 sm:p-8 xl:p-10" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
                      <h4 class="mb-2 text-xl md:text-2xl">{!! $issue['name'] !!}</h4>
                      <p class="leading-snug lg:text-lg line-clamp-3">{!! $issue['desc'] !!}</p>
                    </div>
                  </a>
                @endforeach

              </div>
            </div>

            <div class="flex justify-between w-full tax-btns">
              <div class="left-0 inline-block p-2 ml-2 bg-white bg-opacity-75 rounded-full hover:bg-opacity-100 tax-btn-prev tax-btn lg:ml-6 xl:ml-12">
                <svg class="w-4 h-4 fill-current text-c-blue-200 lg:w-5 lg:h-5 xl:h-6 xl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="right-0 inline-block p-2 mr-2 bg-white bg-opacity-75 rounded-full hover:bg-opacity-100 tax-btn-next tax-btn lg:mr-6 xl:mr-12">
                <svg class="w-4 h-4 fill-current text-c-blue-200 lg:w-5 lg:h-5 xl:w-6 xl:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  @endif

  {{-- @dump($top) --}}
  
  {{-- @dump($more_tax) --}}

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection