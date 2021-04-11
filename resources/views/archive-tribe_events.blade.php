@extends('layouts.app')

@section('content')

  @include('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content])
  @include('partials.event-filters', ['bg' => 'bg-c-gray-50', 'search' => 'false'])

  <div class="container px-6 pt-8 pb-12 mx-auto lg:px-8 md:pt-8 xl:pb-16">
    <div class="lg:flex">
      <div class="mb-6 lg:flex-shrink-0">
        <div class="relative event-calendar lg:pr-8 xl:pr-12 lg:sticky lg:top-[32px]">
          <div class="mx-auto lg:max-w-xs">
          <?php 
            //echo do_shortcode('[tribe_events]')
            
            echo do_shortcode($shortcode)
            
            // use Tribe\Events\Views\V2\Template_Bootstrap;
            // echo tribe( Template_Bootstrap::class )->get_view_html();
      
          ?>
          </div>
        </div>
      </div>

      <div>
        <h2 id="event-title" class="mb-0 text-3xl md:text-3xl lg:text-4xl xl:text-5xl lg:max-w-none">{!! $events_title !!}</h2>
        <div class="flex flex-col divide-y divide-gray-200 posts-ajax-wrapper lg:max-w-none lg:mx-auto">
          @if (! $posts['posts']->have_posts())
            <div class="pt-6 lg:pt-8">
              <x-alert type="warning">
                {!! __('Sorry, no results were found.', 'sage') !!}
              </x-alert>
            </div>
          @else
            @while($posts['posts']->have_posts()) @php($posts['posts']->the_post())
            
              @include('partials.content')
            @endwhile
            @php(wp_reset_postdata())
          @endif
          {{-- @dump($posts) --}}
          {{-- <div>Got here</div> --}}
        </div>

        <div class="flex items-center justify-center space-x-12 pagination-container">
          @if($posts['posts']->max_num_pages > 1)
            <button id="event-prev" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" data-page="2">
              <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              <span>Previous Page</span>
            </button>
          @endif
          <button id="event-next" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" style="display:none;" data-page="0">
            <span class="mr-1">Next Page</span>
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
  </div>
  {{-- @dump($pagi) --}}

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection