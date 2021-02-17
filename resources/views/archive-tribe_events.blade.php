@extends('layouts.app')

@section('content')

  @include('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content])

  <div class="pb-6 event-calendar">
    <?php 
      echo do_shortcode('[tribe_events]')
    ?>

  </div>

  <div class="container px-6 pb-12 mx-auto lg:px-8 md:pt-8 xl:pb-16">

    <h2 id="event-title" class="mb-8 text-2xl md:text-3xl lg:text-4xl xl:text-5xl lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">All Events</h2>
    <div class="flex flex-col divide-y divide-gray-200 posts-ajax-wrapper lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">
      @while($posts['posts']->have_posts()) @php($posts['posts']->the_post())
      
        {{-- @includeFirst(['partials.content-' . get_post_type(), 'partials.content']) --}}
        @include('partials.content')
      @endwhile
      @php(wp_reset_postdata())
      {{-- @dump($posts) --}}
      {{-- <div>Got here</div> --}}
    </div>

    <div class="flex items-center justify-center space-x-12 pagination-container">
      <button id="event-prev" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" data-page="2">
        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span>Previous Page</span>
      </button>
      <button id="event-next" class="inline-flex items-center font-medium text-c-blue-150 font-whyte focus:outline-none" style="display:none;" data-page="0">
        <span class="mr-1">Next Page</span>
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
    
    {{-- {!! $pagi !!} --}}
  </div>
  {{-- @dump($pagi) --}}

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection