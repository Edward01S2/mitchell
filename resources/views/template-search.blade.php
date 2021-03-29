{{--
  Template Name: Search Template
--}}

@extends('layouts.app')

@section('content')
  <?php $search = get_search_query(); ?>  
  <div class="pt-48 pb-16 bg-c-blue-300 lg:pt-56 lg:pb-24 xl:pt-64 xl:pb-40">

    <div class="container px-6 mx-auto lg:px-8">
      <div id="search-container" class="flex items-center w-full max-w-lg mx-auto mb-6 lg:max-w-xl xl:max-w-2xl">
        <div class="mr-4 text-xl font-bold text-white font-whyte md:text-2xl lg:text-3xl">Search:</div>
        <form action="{!! home_url(); !!}" role="search" method="post" id="searchform" class="relative flex-grow">
          <input type="text" id="s" name="s" value="" autocomplete="off" class="w-full py-2 pl-4 pr-6 focus:outline-none font-whyte md:text-lg" placeholder="Search Keyword">
          {{-- <input type="hidden" name="post_type" value="sfwd-courses"> --}}
          <button class="absolute bottom-0 right-0 mb-3 mr-4 md:mb-4" type="submit" id="searchsubmit">
            <svg class="w-4 h-4 text-black fill-current hover:text-c-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
          </button>
        </form>
      </div>
    </div>

    {{-- @if($search)
      <div class="container px-6 mx-auto lg:px-8 md:py-8">
        <h1 class="text-3xl text-center text-white md:text-4xl">Results for "{!! $search !!}"</h1>
      </div>
    @endif

    @include('partials.filters', ['bg' => 'bg-c-blue-300', 'search' => 'true'])
      
    <div class="container px-6 mx-auto lg:px-8 xl:max-w-7xl">
      @while(have_posts()) @php(the_post())
        @include('partials.content-search')
      @endwhile

      {!! $pagi !!}
    </div>

    @if (! have_posts())
    <div class="container px-6 mx-auto mt-4 lg:px-8 md:mt-8 lg:mt-12">
      
      <x-alert type="warning" class="">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
      
    </div>
    @endif --}}

      
    
  </div>
  
@endsection
